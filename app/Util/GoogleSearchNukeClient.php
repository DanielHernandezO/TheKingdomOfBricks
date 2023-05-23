<?php

namespace App\Util;

use App\Interfaces\NukeImageService;
use Illuminate\Support\Facades\Http;

class GoogleSearchNukeClient implements NukeImageService
{
    protected string $domain;
    protected string $apiKey;
    protected string $customSearchEngineId;

    public function __construct()
    {
        $this->domain = config('services.google.domain');
        $this->apiKey = config('services.google.p');
        $this->customSearchEngineId = config('services.google.cx');
    }

    public function getNuke(string $nukeName): string
    {
        $url = $this->domain.'/customsearch/v1?';
        $queryParams = http_build_query([
            'cx' => $this->customSearchEngineId,
            'key' => $this->apiKey,
            'searchType' => 'image',
            'q' => $nukeName.' nuke',
        ]);
        $response = Http::get($url.$queryParams)->json();
        return $response['items'][0]['link'];
    }
}