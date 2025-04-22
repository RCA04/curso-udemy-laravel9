<?php

namespace App\Providers;

use App\Models\Produtos;
use Illuminate\Support\ServiceProvider;
use App\Models\Categoria;

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
    public function boot()
    {
        $categoriasMenu = Categoria::all();
        view()->share('categoriasMenu', $categoriasMenu);
    }
    
    /*{
        $categoriasMenu = Categoria::get(); 
        view()->share('categoriasMenu', $categoriasMenu);
    } */   
}
