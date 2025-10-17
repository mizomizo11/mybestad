<?php

namespace App\Services;

use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Checkout\Session;
use Stripe\Webhook;
use Stripe\Refund;
use Stripe\Exception\SignatureVerificationException;
use Exception;

class StripeService
{
    /**
     * Initialize Stripe with API key
     */
    public function __construct()
    {
        Stripe::setApiKey(config('stripe.secret_key'));
    }

    /**
     * Create a payment intent for processing payments
     *
     * @param array $data
     * @return PaymentIntent
     * @throws Exception
     */
    public function createPaymentIntent(array $data)
    {
        try {
            return PaymentIntent::create([
                'amount' => $data['amount'] * 100, // Convert to cents
                'currency' => config('stripe.currency'),
                'metadata' => $data['metadata'] ?? [],
                'customer_email' => $data['customer_email'] ?? null,
                'description' => $data['description'] ?? 'Payment for consultation',
            ]);
        } catch (Exception $e) {
            throw new Exception('Failed to create payment intent: ' . $e->getMessage());
        }
    }

    /**
     * Create a checkout session for redirect-based payments
     *
     * @param array $data
     * @return Session
     * @throws Exception
     */
    public function createCheckoutSession(array $data)
    {
        try {
            return Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => config('stripe.currency'),
                        'product_data' => [
                            'name' => $data['product_name'] ?? 'Consultation',
                        ],
                        'unit_amount' => $data['amount'] * 100, // Convert to cents
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => $data['success_url'] ?? config('stripe.success_url'),
                'cancel_url' => $data['cancel_url'] ?? config('stripe.cancel_url'),
                'customer_email' => $data['customer_email'] ?? null,
                'metadata' => $data['metadata'] ?? [],
            ]);
        } catch (Exception $e) {
            throw new Exception('Failed to create checkout session: ' . $e->getMessage());
        }
    }

    /**
     * Retrieve a payment intent by ID
     *
     * @param string $paymentIntentId
     * @return PaymentIntent
     * @throws Exception
     */
    public function getPaymentIntent(string $paymentIntentId)
    {
        try {
            return PaymentIntent::retrieve($paymentIntentId);
        } catch (Exception $e) {
            throw new Exception('Failed to retrieve payment intent: ' . $e->getMessage());
        }
    }

    /**
     * Confirm a payment intent
     *
     * @param string $paymentIntentId
     * @return PaymentIntent
     * @throws Exception
     */
    public function confirmPaymentIntent(string $paymentIntentId)
    {
        try {
            $paymentIntent = PaymentIntent::retrieve($paymentIntentId);
            return $paymentIntent->confirm();
        } catch (Exception $e) {
            throw new Exception('Failed to confirm payment intent: ' . $e->getMessage());
        }
    }

    /**
     * Handle webhook events
     *
     * @param string $payload
     * @param string $signature
     * @return array
     * @throws Exception
     */
    public function handleWebhook(string $payload, string $signature)
    {
        try {
            $event = Webhook::constructEvent(
                $payload,
                $signature,
                config('stripe.webhook_secret')
            );

            return [
                'success' => true,
                'event' => $event,
                'type' => $event->type,
                'data' => $event->data->object
            ];
        } catch (SignatureVerificationException $e) {
            throw new Exception('Invalid webhook signature: ' . $e->getMessage());
        } catch (Exception $e) {
            throw new Exception('Webhook handling failed: ' . $e->getMessage());
        }
    }

    /**
     * Create a refund for a payment intent
     *
     * @param string $paymentIntentId
     * @param int|null $amount Amount in cents (null for full refund)
     * @return Refund
     * @throws Exception
     */
    public function createRefund(string $paymentIntentId, ?int $amount = null)
    {
        try {
            $refundData = [
                'payment_intent' => $paymentIntentId,
            ];

            if ($amount !== null) {
                $refundData['amount'] = $amount;
            }

            return Refund::create($refundData);
        } catch (Exception $e) {
            throw new Exception('Failed to create refund: ' . $e->getMessage());
        }
    }

    /**
     * Get the publishable key for frontend
     *
     * @return string
     */
    public function getPublishableKey()
    {
        return config('stripe.publishable_key');
    }

    /**
     * Check if the payment is in test mode
     *
     * @return bool
     */
    public function isTestMode()
    {
        return config('stripe.test_mode');
    }
}
