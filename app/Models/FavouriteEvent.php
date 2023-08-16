<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FavouriteEvent extends Model
{
    use HasFactory,SoftDeletes;
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function event()
    {
        // return $this->belongsTo(Event::class,'activity_id');
        return $this->belongsTo(Event::class,'event_id');
    }
}