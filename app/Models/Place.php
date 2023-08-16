<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Place extends Model
{
    use SoftDeletes,CascadeSoftDeletes;
    use HasFactory;
    //protected $cascadeDeletes = ['activities','liveBoards','events'];
   
    protected $fillable = [
        'name',
        'location',
        'image',
        'overview',
        'overview_de',
        'overview_cz',
        'shortoverview',
        'shortoverview_de',
        'shortoverview_cz',
        'coverimage',
        'slug',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    // public function activities()
    // {
    //     return $this->hasMany(Activity::class);
    // }
    // public function liveBoards()
    // {
    //     return $this->hasMany(LiveBoard::class,'livaboard_places','place_id','liveboard_id');
    // }   
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'activity_places');
    }

    public function liveaboards()
    {
        return $this->belongsToMany(LiveBoard::class, 'livaboard_places','place_id','liveboard_id');
    }
    
}
