<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'publishers';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'publisher_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     */
    public $incrementing = true;

    /**
     * The data type of the primary key.
     */
    protected $keyType = 'int';

    /**
     * Indicates if the model should be timestamped.
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'publisher_name',
        'contact_info',
        'address',
    ];

    public function books()
    {
        return $this->hasMany(Books::class, 'publisher_id');
    }
}
