<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favourite extends Model
{
    use HasFactory,SoftDeletes,CascadeSoftDeletes;
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function activity()
    {
        return $this->belongsTo(Activity::class,'activity_id');
    }

}
