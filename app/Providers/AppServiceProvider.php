<?php

namespace App\Providers;

use App\Models\ReservaEfetuada;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('ListaDeReservas', \App\Models\ListaDeReservas::class);

        $this->app->bind(\App\Http\Controllers\ListaDasMesasReservadasController::class, function($app){
            return new \App\Http\Controllers\ListaDasMesasReservadasController(
                $app->get('ListaDeReservas')
            );
        });

        $this->app->bind(\App\Http\Controllers\HomeController::class, function($app){
            return new \App\Http\Controllers\HomeController(
                $app->get('ListaDeReservas')
            );
        });

        $this->app->bind(\App\Http\Controllers\ReservaDeMesaController::class, function($app){
            return new \App\Http\Controllers\ReservaDeMesaController(
                new ReservaEfetuada
            );
        });
    }
}
