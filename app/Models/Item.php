<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Item extends Model
{
    use HasFactory;

    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the item primary key (id)
     * $this->attributes['title'] - string - contains the item title
     * $this->attributes['type'] - string - contains the item type
     * $this->attributes['price'] - int - contains the item price
     * $this->attributes['guide'] - string - contains the item guide
     * $this->attributes['pieces'] - int - contains the item number of pieces
     * $this->attributes['stock'] - int - contains the item stock
     * $this->attributes['image'] - string - contains the item image path
     */
    protected $fillable = ['title', 'type', 'price', 'guide', 'pieces', 'stock', 'image'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|gt:0',
            'guide' => 'required',
            'pieces' => 'required|gt:0',
            'stock' => 'required|gt:0',
            'image' => 'required|image|mimes:jpeg,bmp,png'
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
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

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }
}
