<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DropboxServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
       /* //Extendemos el storage a laravel agragando nuestro nuevo driver
        Storage::extend('dropbox', function ($app, $config) { 
            $client = new DropboxClient(
                $config['authorizationToken'] // Hacemos referencia al hash
            );
    
            return new Filesystem(new DropboxAdapter($client)); 
        });*/
    }
}
