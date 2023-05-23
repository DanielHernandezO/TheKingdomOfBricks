<?php

namespace App\Providers;

use App\Interfaces\FlagImageService;
use App\Util\FlagCdnImageClient;
use App\Util\GoogleSearchFlagClient;
use Illuminate\Support\ServiceProvider;

class FlagImageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(FlagImageService::class, function () {
            return new FlagCdnImageClient();
        });
    }
}
