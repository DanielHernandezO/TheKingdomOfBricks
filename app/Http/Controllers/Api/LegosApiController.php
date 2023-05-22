<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\JsonResponse;

class LegosApiController extends Controller
{
    public function index(): JsonResponse
    {
        $items = ItemResource::collection(Item::all());

        return response()->json($items, 200);
    }
}
