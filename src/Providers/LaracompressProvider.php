<?php

namespace Laracompress\Providers;

use Illuminate\Support\ServiceProvider;
use Laracompress\LaracompressService;

class LaracompressProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('laracompress',LaracompressService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadHepers();
    }

    private function loadHepers(){
        require __DIR__ .'/../helpers.php';
    }
}
