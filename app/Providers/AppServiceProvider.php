<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;


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
        Model::unguard();
        FilamentAsset::register([
            Js::make('custom-script', __DIR__ . '/../../resources/js/custom.js'),
        ]);
    }
}
