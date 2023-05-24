<?php

namespace App\Interfaces;

interface FlagImageService
{
    public function getFlag(string $countryId): string;
}
