<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LiveboardSchedule extends Model
{
    use HasFactory,SoftDeletes;
    protected $cascadeDeletes = ['favourites'];
    
}
