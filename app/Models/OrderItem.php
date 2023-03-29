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
     * $this->attributes['order_id'] - Int - contains the associated Order
     * $this->attributes['item_idd'] - Int - contains the associated Item
     */
    protected $fillable = ['quantity'];

    public static function validate($request)
    {
        $request->validate([
            'price' => 'required|numeric|gt:0',
            'quantity' => 'required|numeric|gt:0',
            'item_id' => 'required|exists:products,id',
            'order_id' => 'required|exists:orders,id',
        ]);
    }

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

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getOrderId(): int
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId(int $orderId): void
    {
        $this->attributes['order_id'] = $orderId;
    }

    public function getItemId(): int
    {
        return $this->attributes['item_id'];
    }

    public function setItemId(int $itemId): void
    {
        $this->attributes['item_id'] = $itemId;
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
