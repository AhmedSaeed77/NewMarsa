<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partener extends Model
{
    use HasFactory;

    protected $table = 'parteners';

    protected $fillable = [
        'image',         
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
