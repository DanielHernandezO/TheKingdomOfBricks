<?php

namespace App\Interfaces;

interface NukeImageService
{
    public function getNuke(string $nukeName): string;
}
