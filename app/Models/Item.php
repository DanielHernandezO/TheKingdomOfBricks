<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'type', 'price', 'guide', 'pieces', 'stock'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getTitle(): string
    {
        return $this->attributes['title'];
    }

    public function setTitle(string $title): void
    {
        $this->attributes['title'] = $title;
    }

    public function getType(): string
    {
        return $this->attributes['type'];
    }

    public function setType(string $type): void
    {
        $this->attributes['type'] = $type;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getGuide(): string
    {
        return $this->attributes['guide'];
    }

    public function setGuide(string $guide): void
    {
        $this->attributes['guide'] = $guide;
    }

    public function getPieces(): int
    {
        return $this->attributes['pieces'];
    }

    public function setPieces(int $pieces): void
    {
        $this->attributes['pieces'] = $pieces;
    }

    public function getStock(): int
    {
        return $this->attributes['stock'];
    }

    public function setStock(int $stock): void
    {
        $this->attributes['stock'] = $stock;
    }

    public static function validate(Request $request): void
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|gt:0',
            'guide' => 'required',
            'pieces' => 'required|gt:0',
            'stock' => 'required|gt:0',
        ]);
    }
}
