<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'type' => $this->getType(),
            'image' => $this->getImage(),
            'guide' => $this->getGuide(),
            'reviews' => $this->getReviews(),
        ];
    }
}
