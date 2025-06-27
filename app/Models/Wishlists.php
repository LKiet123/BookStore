<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlists extends Model
{
    use HasFactory;

    protected $table = 'wishlists';

    protected $fillable = [
        'user_id',
        'book_id',
    ];

    // Each wishlist belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Each wishlist belongs to a book
    public function book()
    {
        return $this->belongsTo(Books::class, 'book_id');
    }
}