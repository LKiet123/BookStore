<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class RepoBook extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

       protected $table = 'repo_books';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'book_id',
        'warehouse_id',
        'quantity',
      
        
    ];
      public function repo()
    {
        return $this->belongsTo(Repo::class, 'warehouse_id');
    }

}
