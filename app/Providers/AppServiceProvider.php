<?php

namespace App\Providers;

use App\Faker\SpecialityProvider;
use App\Faker\DoctorTitleProvider;
use Illuminate\Support\ServiceProvider;

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
        fake()->addProvider(new DoctorTitleProvider(fake()));
        fake()->addProvider(new SpecialityProvider(fake()));

    }
}