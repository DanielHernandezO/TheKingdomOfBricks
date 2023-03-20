<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store(Request $request, string $folder): string
    {
        if ($request->hasFile('image')) {
            $request->image->store($folder, 'public');
            return $request->image->hashName();
        }
    }
}
