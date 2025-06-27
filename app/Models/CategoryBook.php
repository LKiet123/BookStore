<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBook extends Model
{
    protected $fillable = [
        'book_id',
        'category_id',
    ];

    public $timestamps = true;

    public function book()
    {
        return $this->belongsTo(Books::class);
    }

    // Each CategoryBook belongs to a Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
