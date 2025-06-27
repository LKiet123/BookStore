<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersDetails extends Model
{
    use HasFactory;

    protected $table = 'orders_detail';

    protected $primaryKey = 'order_detail_id';

    protected $fillable = [
        'order_id',
        'book_id',
        'quantity',
        'price',
    ];
}