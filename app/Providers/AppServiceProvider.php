<?php

namespace App\Providers;

use App\Models\ProductVariant;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('unique_variant', function ($attribute, $value, $parameters, $validator) {
            // Parameters contain the values to check
            [$productId, $color, $size] = $parameters;

            // Check if a product variant with the same productID, color, and size exists
            return !ProductVariant::where('productID', $productId)
                ->where('color', $color)
                ->where('size', $size)
                ->exists();
        });
    }
}
