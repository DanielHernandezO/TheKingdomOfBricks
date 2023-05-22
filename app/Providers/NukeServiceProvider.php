<?php

namespace App\Providers;

use App\Interfaces\NukeService;
use App\Util\NukeClient;
use Illuminate\Support\ServiceProvider;

class NukeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(NukeService::class, function () {
            return new NukeClient();
        });
    }
}
