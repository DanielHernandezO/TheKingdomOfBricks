<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the order primary key (id)
     * $this->attributes['total_amount'] - int - contains the total amount of the order 
     * $this->attributes['status'] - string - contains the status of the order (PENDING,PAID,REFUNDED)
     * $this->attributes['created_at'] - date - contains the creation date 
     * $this->attributes['update_at'] - date - contains the date of the last update

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
}

