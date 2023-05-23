<?php

namespace App\Util;

use App\Interfaces\FlagImageService;

class FlagCdnImageClient implements FlagImageService
{
    protected string $domain;

    public function __construct()
    {
        $this->domain = config('services.flagcdn.domain');
    }

    public function getFlag(string $countryId): string
    {
        $url = $this->domain.'/w320/';
        $file = strtolower($countryId).'.png';
        return $url.$file;
    }
}