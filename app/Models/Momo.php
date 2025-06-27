<?php
// app/Models/Momo.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Momo extends Model
{
    protected $table = 'momo_transactions';
    protected $fillable = [
        'order_id',
        'amount',
        'request_id',
        'order_info',
        'pay_url',
    ];
}