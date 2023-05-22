<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Character extends Model
{
    use HasFactory;

    /**
     * CHARACTER ATTRIBUTES
     * $this->attributes['id'] - int - contains the character primary key (id)
     * $this->attributes['name'] - string - contains the character name
     * $this->attributes['user'] - User - contains the character associated user
     * $this->attributes['items'] - Item - contains the character associated items (head, chest, legs)
     */
    protected $fillable = ['name'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getHead(): Item
    {
        return $this->items()->wherePivot('type', 'head')->first();
    }

    public function setHead(Item $item): void
    {
        $this->items()->attach($item, ['type' => 'head']);
    }

    public function getChest(): Item
    {
        return $this->items()->wherePivot('type', 'chest')->first();
    }

    public function setChest(Item $item): void
    {
        $this->items()->attach($item, ['type' => 'chest']);
    }

    public function getLegs(): Item
    {
        return $this->items()->wherePivot('type', 'legs')->first();
    }

    public function setLegs(Item $item): void
    {
        $this->items()->attach($item, ['type' => 'legs']);
    }

    public function getTotalPrice(): int
    {
        return $this->getHead()->getPrice() +
               $this->getChest()->getPrice() +
               $this->getLegs()->getPrice();
    }

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'character_items', 'character_id', 'item_id')
                    ->withPivot('type');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
