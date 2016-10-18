<?php

namespace Mateusjatenee\GoogleVision\Providers;

use Guzzle\Http\Client;
use Illuminate\Support\ServiceProvider;
use Mateusjatenee\GoogleVision\Vision;

class LaravelServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->bind('vision', function ($app) {
            return new Vision(config('services.google.vision.api_key'), new Client);
        });
    }
}
