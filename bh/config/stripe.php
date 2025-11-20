<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Stripe Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains the configuration for Stripe payment gateway.
    | You can get your API keys from the Stripe dashboard.
    |
    */

    /**
     * Stripe API Key
     * Accepted value: Your Stripe Secret Key from the dashboard
     */
    'secret_key' => env('STRIPE_SECRET_KEY', 'sk_test_26PHem9AhJZvU623DfE1x4sd'),

    /**
     * Stripe Publishable Key
     * Accepted value: Your Stripe Publishable Key from the dashboard
     */
    'publishable_key' => env('STRIPE_PUBLISHABLE_KEY', 'pk_test_51O8XqgAhJZvU623D7VwqN9v8B4K2rH3fL9pQ6sT1uV4wX7yZ0aB3cE6fH9jK2mN5pQ8sT1uV4wX7yZ'),

    /**
     * Test Mode (boolean)
     * Accepted value: true for the test mode or false for the live mode
     */
    'test_mode' => env('STRIPE_TEST_MODE', true),

    /**
     * Currency (string)
     * Accepted value: USD, EUR, GBP, etc. (ISO 4217 currency codes)
     */
    'currency' => env('STRIPE_CURRENCY', 'USD'),

    /**
     * Webhook Secret Key (string)
     * Enable webhook on your Stripe account dashboard then paste the secret key here.
     * The webhook endpoint will be: https://{your-domain}/stripe/webhook
     */
    'webhook_secret' => env('STRIPE_WEBHOOK_SECRET'),

    /**
     * Success URL
     * URL to redirect after successful payment
     */
    'success_url' => env('STRIPE_SUCCESS_URL', '/payment/success'),

    /**
     * Cancel URL
     * URL to redirect after cancelled payment
     */
    'cancel_url' => env('STRIPE_CANCEL_URL', '/payment/cancel'),
];
