<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_name',
        'category_desc',
    ];

    public function books()
    {
        return $this->belongsToMany(Books::class, 'category_book', 'category_id', 'book_id');
    }

    protected static function booted()
{
    static::deleting(function ($category) {
        $category->books()->detach();
    });
}
}