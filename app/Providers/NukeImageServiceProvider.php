<?php

namespace App\Providers;

use App\Interfaces\NukeImageService;
use App\Util\GoogleSearchNukeClient;
use Illuminate\Support\ServiceProvider;

class NukeImageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(NukeImageService::class, function () {
            return new GoogleSearchNukeClient();
        });
    }
}
