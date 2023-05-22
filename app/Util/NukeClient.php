<?php

namespace App\Util;

use App\Interfaces\NukeService;
use Illuminate\Support\Facades\Http;

class NukeClient implements NukeService
{
    private string $domain;

    public function __construct()
    {
        $this->domain = config('services.nuke.domain');
    }

    public function getAllBombs(): array
    {
        return Http::get($this->domain.'/api/bombs')->json();
    }
}
