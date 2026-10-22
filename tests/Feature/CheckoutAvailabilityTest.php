<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class CheckoutAvailabilityTest extends TestCase
{
    public function test_payment_processing_routes_and_views_are_removed(): void
    {
        $this->assertTrue(Route::has('front.checkout'));
        $this->assertFalse(Route::has('front.checkout_store'));
        $this->assertFalse(Route::has('front.success_checkout'));
        $this->assertFalse(Route::has('midtrans.callback'));
        $this->assertFalse(view()->exists('front.payment'));
    }

    public function test_payment_submission_endpoint_is_not_available(): void
    {
        $this->post('/checkout/example-product')->assertStatus(405);
    }
}
