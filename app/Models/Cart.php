<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $primaryKey = 'cart_id';

    protected $fillable = [
        'user_id',
        'book_id',
        'quantity',
    ];
    public function book()
    {
        return $this->belongsTo(Books::class, 'book_id', 'book_id');
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
