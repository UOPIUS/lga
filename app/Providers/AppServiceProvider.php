<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema; //NEW: Import Schema
use Illuminate\Support\ServiceProvider;
use App\Repositories;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserRepository::class, EloquentUser::class);
        //TaxPayer
        $this->app->bind('App\Repositories\TaxPayer\TaxPayerInterface', 
            'App\Repositories\TaxPayer\TaxPayerRepository');
        //LGA
        $this->app->bind('App\Repositories\LocalGovernment\LocalGovernmentInterface', 
            'App\Repositories\LocalGovernment\LocalGovernmentRepository');
        //LGA
        $this->app->bind('App\Repositories\State\StateInterface', 
            'App\Repositories\State\StateRepository');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); //NEW: Increase StringLength
    }
}
