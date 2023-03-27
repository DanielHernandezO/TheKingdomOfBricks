<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    /**
     * ORDERITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the OrderItem primary key (id)
     * $this->attributes['quantity'] - int - contains the amount of units to buy
     * $this->attributes['order'] - Order - contains the associated Order
     * $this->attributes['item'] - Item - contains the associated Item
     */
    protected $fillable = ['quantity'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder(Order $order): void
    {
        $this->order = $order;
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function getItem(): Item
    {
        return $this->item;
    }

    public function setItem(Item $item): void
    {
        $this->item = $item;
    }
}
