<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDB extends Model
{
    use HasFactory;

    protected $table = 'cart_d_b';

    protected $primaryKey = 'cartDB_id';

    protected $fillable = [
        'user_id',
        'book_id',
        'quantity',
        'crated_at',
       
    ];
}