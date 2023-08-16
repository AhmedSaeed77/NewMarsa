<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;

class ActivityBooking extends Model
{
    use HasFactory,SoftDeletes;

    protected $hidden = [
        //'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $table = 'booking_activities';

   //protected $cascadeDeletes = ['activity'];
    

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

}
