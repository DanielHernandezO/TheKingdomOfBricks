<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;


class Order extends Model
{
    /**
     * Order ATTRIBUTES
     * $this->attributes['id'] - int - contains the order primary key (id)
     * $this->attributes['total_amount'] - int - contains the total amount of the order 
     * $this->attributes['status'] - string - contains the status of the order (PENDING,PAID,REFUNDED)
     * $this->attributes['user'] - User - contains the associated User
     * $this->attributes['created_at'] - string - contains the creation date 
     * $this->attributes['update_at'] - string - contains the date of the last update

     */
    protected $fillable = ['id', 'total_amount', 'status'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getTotalAmount(): int
    {
        return $this->attributes['total_amount'];
    }

    public function setTotalAmount(int $totalAmount): void
    {
        $this->attributes['total_amount'] = $totalAmount;
    }

    public function getStatus(): string
    {
        return $this->attributes['status'];
    }

    public function setStatus(string $status): void
    {
        $this->attributes['status'] = $status;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function orderItem(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getOrderItem(): Collection
    {
        return $this->orderItem;
    }

    public function setOrderItem(Collection $orderItem): void
    {
        $this->orderItem = $orderItem;
    }
}


