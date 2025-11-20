<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Coupon;
use App\Models\Payment;
use App\Models\Settings;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

//use RealRashid\SweetAlert\Facades\Alert;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    public function handlePayment(Request $request)
    {
        $specialty = Specialty::where('id', session()->get('doctor')->specialty_id)->orderBy('record_order', 'asc')->first();
        //$price=$specialty->price;
        if ($request->number) {

            session()->put('the_coupon_number', $request->number);

            $coupon = Coupon::where('number', $request->number)->first();
            if ($coupon) {
                if ($coupon->used == "yes") {
                    $price = $specialty->price;
                    // coupon_was_used_before
                } else {
                    $price = $specialty->price - $coupon->value;
                    //coupon_number_is_valid
                }
            }
//            else {
//                return response()->json([
//                    'status' => 'false',
//                    'message' => __('site.coupon_number_is_not_valid'),
//                ]);
//            }
        } else {
            $price = $specialty->price;
        }


        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success.payment',['locale'=>app()->getLocale()]),
                "cancel_url" => route('cancel.payment',['locale'=>app()->getLocale()]),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "$price"
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('cancel.payment',['locale'=>app()->getLocale()])
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('create.payment',['locale'=>app()->getLocale()])
                ->with('error', $response['message'] ?? 'Something went wrong.');

        }
    }

    public function paymentCancel()
    {
        return redirect(app()->getLocale() . "/patients/steps#step-2")->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    public function paymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $consultation = Consultation::updateOrInsert(
                [
                    'doctor_id' => session("the_doctor_id"),
                    'patient_id' => Auth::guard('patient')->user()->id,
                    "status" => "open"
                ]
            );
            $lastID = DB::getPdo()->lastInsertId();
            $payment = Payment::create(
                [
                    'consultation_id' => $lastID,
                    'payment_method' => "paypal",
                    'payment_value' => "444",
                ]
            );

            //update coupon to used is yes
            Coupon::where('number', @session("the_coupon_number"))
                ->update([
                    'used' => "yes"
                ]);
            return redirect(app()->getLocale() . "/patients/steps#step-2")->with('success', 'Transaction complete.');

        } else {
            return redirect(app()->getLocale() . "/patients/steps#step-2")->with('error', $response['message'] ?? 'Something went wrong.');

        }
    }

    public function paymentTesting(Request $request)
    {


        $consultation = Consultation::updateOrInsert(
            [
                'doctor_id' => session("the_doctor_id"),
                'patient_id' => Auth::guard('patient')->user()->id,
                "status" => "open"
            ]
//                ['doctor_id' => $request->appointment_id,'agreement' => 'yes', ]
        );
        $lastID = DB::getPdo()->lastInsertId();
        $payment = Payment::create(
            [
                'consultation_id' => $lastID,
                'payment_method' => "paypal",
                'payment_value' => "444",
            ]
        );


        if ($payment) {
            return response()->json([
                'status' => 'true',
                'msg' => 'store success',
            ]);
        } else {
            return response()->json([
                'status' => 'false',
            ]);
        }

        //  return   redirect(app()->getLocale()."/patients/steps#step-3");

//        } else {
//            return   redirect(app()->getLocale()."/patients/steps#step-2")->with('error', $response['message'] ?? 'Something went wrong.');
//
//        }
    }
}
