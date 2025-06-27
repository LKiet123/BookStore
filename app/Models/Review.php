<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'user_id',
        'book_id',
        'rating',
        'comment',
        'date_review'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function book()
    {
        return $this->belongsTo(Books::class, 'book_id');
    }
}
 