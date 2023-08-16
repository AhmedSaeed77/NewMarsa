<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestEvent extends Model
{
    use HasFactory;
    protected $table = 'best_event';
    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
