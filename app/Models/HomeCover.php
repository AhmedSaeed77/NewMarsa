<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeCover extends Model
{
    use HasFactory;
    
    protected $table = 'home_covers';

    protected $fillable = [
        'image',  
        'indexx'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
