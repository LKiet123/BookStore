<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'authors';
    protected $primaryKey = 'author_id';

    protected $fillable = [
        'author_name',
        'birth_date',
        'hometown',
        'cover_image',
        'bio',
    ];

    public function books()
    {
        return $this->hasMany(Books::class, 'author_id');
    }
}
