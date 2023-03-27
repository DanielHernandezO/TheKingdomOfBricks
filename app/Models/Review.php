<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    /**
     * REVIEW ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->attributes['rating'] - int - contains the rating of the review
     * $this->attributes['comment'] - string - contains the review comment
     * $this->attributes['item'] - Item - contains the associated Item
     */
    protected $fillable = ['rating', 'comment'];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getRating(): int
    {
        return $this->attributes['rating'];
    }

    public function setRating(int $rating): void
    {
        $this->attributes['rating'] = $rating;
    }

    public function getComment(): string
    {
        return $this->attributes['comment'];
    }

    public function setComment(string $comment): void
    {
        $this->attributes['comment'] = $comment;
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function getItem(): Item
    {
        return $this->item;
    }

    public function setItem($item): void
    {
        $this->item = $item;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): Item
    {
        return $this->user;
    }

    public function setUser($user): void
    {
        $this->user = $user;
    }

    public static function validate(Request $request): void
    {
        $request->validate([
            'rating' => 'required',
            'comment' => 'required',
        ]);
    }
}
