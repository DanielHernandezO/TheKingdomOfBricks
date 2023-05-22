<?php

namespace App\Util;

use App\Interfaces\NukeService;
use Illuminate\Support\Facades\Http;

class NukeClient implements NukeService
{
    private string $uri;
    public function __construct() {
        $this->uri = 'https://www.nukestore.world';
    }
    public function getAllBombs(): array
    {
        return Http::get($this->uri.'/api/bombs')->json();
    }
}
