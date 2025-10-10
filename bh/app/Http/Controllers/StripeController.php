<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Coupon;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\Specialty;
use App\Services\StripeService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\Checkout\Session;
use Exception;

class StripeController extends Controller
{
    protected $stripeService;

    public function __construct(StripeService $stripeService)
    {
        $this->stripeService = $stripeService;
    }

    /**
     * Create a payment intent and return client secret for frontend
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function createPaymentIntent(Request $request): JsonResponse
    {
        try {
            $specialty = Specialty::where('id', session()->get('doctor')->specialty_id)
                ->orderBy('record_order', 'asc')
                ->first();

            $price = $specialty->price;
            $couponNumber = null;

            if ($request->number) {
                session()->put('the_coupon_number', $request->number);
                $couponNumber = $request->number;

                $coupon = Coupon::where('number', $request->number)->first();
                if ($coupon && $coupon->used !== "yes") {
                    $price = $specialty->price - $coupon->value;
                }
            }

            $paymentData = [
                'amount' => $price,
                'currency' => config('stripe.currency'),
                'customer_email' => Auth::guard('patient')->user()->email,
                'description' => 'Consultation payment',
                'metadata' => [
                    'doctor_id' => session("the_doctor_id"),
                    'coupon_number' => $couponNumber,
                    'patient_id' => Auth::guard('patient')->user()->id,
                    'specialty_id' => $specialty->id,
                ]
            ];

            $paymentIntent = $this->stripeService->createPaymentIntent($paymentData);

            return response()->json([
                'success' => true,
                'client_secret' => $paymentIntent->client_secret,
                'amount' => $price,
                'currency' => config('stripe.currency'),
                'publishable_key' => $this->stripeService->getPublishableKey()
            ]);

        } catch (Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage()
            ], 500);
        }
    }

    /**
     * Show Stripe checkout page
     *
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function showCheckout(Request $request)
    {
        try {
            $specialty = Specialty::where('id', session()->get('doctor')->specialty_id)
                ->orderBy('record_order', 'asc')
                ->first();

            $price = $specialty->price;
            $couponNumber = null;

            if ($request->number) {
                session()->put('the_coupon_number', $request->number);
                $couponNumber = $request->number;

                $coupon = Coupon::where('number', $request->number)->first();
                if ($coupon && $coupon->used !== "yes") {
                    $price = $specialty->price - $coupon->value;
                }
            }

            return view('stripe.checkout', [
                'publishable_key' => $this->stripeService->getPublishableKey(),
                'amount' => $price,
                'coupon_number' => $couponNumber,
                'specialty' => $specialty
            ]);

        } catch (Exception $ex) {
            return redirect(app()->getLocale() . "/patients/steps#step-2")
                ->with('error', 'Failed to load payment page: ' . $ex->getMessage());
        }
    }

    /**
     * Create a checkout session for redirect-based payment
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function createCheckoutSession(Request $request): RedirectResponse
    {
        try {
            $specialty = Specialty::where('id', session()->get('doctor')->specialty_id)
                ->orderBy('record_order', 'asc')
                ->first();

            $price = $specialty->price;
            $couponNumber = null;

            if ($request->number) {
                session()->put('the_coupon_number', $request->number);
                $couponNumber = $request->number;

                $coupon = Coupon::where('number', $request->number)->first();
                if ($coupon && $coupon->used !== "yes") {
                    $price = $specialty->price - $coupon->value;
                }
            }

            $sessionData = [
                'amount' => $price,
                'product_name' => 'Consultation - ' . $specialty->name,
                'customer_email' => Auth::guard('patient')->user()->email,
                'success_url' => url(app()->getLocale() . '/stripe/success?session_id={CHECKOUT_SESSION_ID}'),
                'cancel_url' => url(app()->getLocale() . '/stripe/cancel'),
                'metadata' => [
                    'doctor_id' => session("the_doctor_id"),
                    'coupon_number' => $couponNumber,
                    'patient_id' => Auth::guard('patient')->user()->id,
                    'specialty_id' => $specialty->id,
                ]
            ];

            $session = $this->stripeService->createCheckoutSession($sessionData);

            return redirect($session->url);

        } catch (Exception $ex) {
            return redirect(app()->getLocale() . "/patients/steps#step-2")
                ->with('error', 'Payment failed: ' . $ex->getMessage());
        }
    }

    /**
     * Handle successful payment confirmation
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function handleSuccess(Request $request): RedirectResponse
    {
        try {
            $sessionId = $request->query('session_id');
            
            if (!$sessionId) {
                return redirect(app()->getLocale() . "/patients/steps#step-2")
                    ->with('error', 'Invalid payment session.');
            }

            // Retrieve the session from Stripe to get payment details
            $session = Session::retrieve($sessionId);
            
            if ($session->payment_status === 'paid') {
                $metadata = $session->metadata;
                
                // Create consultation record
                $consultation = Consultation::updateOrInsert(
                    [
                        'doctor_id' => $metadata['doctor_id'],
                        'patient_id' => $metadata['patient_id'],
                        'status' => 'open'
                    ]
                );
                
                $lastID = DB::getPdo()->lastInsertId();
                
                // Create payment record
                $payment = Payment::create([
                    'consultation_id' => $lastID,
                    'payment_method' => 'stripe',
                    'payment_value' => $session->amount_total / 100, // Convert from cents
                ]);

                // Update coupon if used
                if (!empty($metadata['coupon_number'])) {
                    Coupon::where('number', $metadata['coupon_number'])
                        ->update(['used' => 'yes']);
                }

                return redirect(app()->getLocale() . "/patients/steps#step-2")
                    ->with('success', 'Payment completed successfully!');
            } else {
                return redirect(app()->getLocale() . "/patients/steps#step-2")
                    ->with('error', 'Payment was not completed.');
            }

        } catch (Exception $ex) {
            return redirect(app()->getLocale() . "/patients/steps#step-2")
                ->with('error', 'Payment verification failed: ' . $ex->getMessage());
        }
    }

    /**
     * Handle cancelled payment
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function handleCancel(Request $request): RedirectResponse
    {
        return redirect(app()->getLocale() . "/patients/steps#step-2")
            ->with('error', 'Payment was cancelled.');
    }

    /**
     * Handle webhook events from Stripe
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function handleWebhook(Request $request): JsonResponse
    {
        try {
            $payload = $request->getContent();
            $signature = $request->header('Stripe-Signature');

            $result = $this->stripeService->handleWebhook($payload, $signature);

            // Handle different event types
            switch ($result['type']) {
                case 'payment_intent.succeeded':
                    $this->handlePaymentSucceeded($result['data']);
                    break;
                case 'payment_intent.payment_failed':
                    $this->handlePaymentFailed($result['data']);
                    break;
                default:
                    // Log unhandled event types
                    \Log::info('Unhandled Stripe webhook event: ' . $result['type']);
            }

            return response()->json(['success' => true]);

        } catch (Exception $ex) {
            \Log::error('Stripe webhook error: ' . $ex->getMessage());
            return response()->json(['error' => $ex->getMessage()], 400);
        }
    }

    /**
     * Handle successful payment webhook
     *
     * @param object $paymentIntent
     */
    private function handlePaymentSucceeded($paymentIntent)
    {
        $metadata = $paymentIntent->metadata;
        
        // Create consultation record
        $consultation = Consultation::updateOrInsert(
            [
                'doctor_id' => $metadata['doctor_id'],
                'patient_id' => $metadata['patient_id'],
                'status' => 'open'
            ]
        );
        
        $lastID = DB::getPdo()->lastInsertId();
        
        // Create payment record
        $payment = Payment::create([
            'consultation_id' => $lastID,
            'payment_method' => 'stripe',
            'payment_value' => $paymentIntent->amount / 100, // Convert from cents
        ]);

        // Update coupon if used
        if (!empty($metadata['coupon_number'])) {
            Coupon::where('number', $metadata['coupon_number'])
                ->update(['used' => 'yes']);
        }
    }

    /**
     * Handle failed payment webhook
     *
     * @param object $paymentIntent
     */
    private function handlePaymentFailed($paymentIntent)
    {
        \Log::info('Payment failed for payment intent: ' . $paymentIntent->id);
        // You can add additional logic here, such as sending notification emails
    }
}
