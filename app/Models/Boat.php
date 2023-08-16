<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Boat extends Model
{
    use HasFactory;

    use SoftDeletes; 

    protected $table = 'boats';

    public $fillable = [ 'id' , 'name_en' , 'name_de' , 'name_cz' , 'overview_en', 'overview_de' , 'overview_cz' , 'image' ,'slug' ];

    protected $dates = [ 'deleted_at' ];
    
    protected $hidden = [
        'updated_at',
        'deleted_at',
        'created_at' ,
    ];

    public function liveboard()
    {
        return $this->belongsToMany(LiveBoard::class,'liveboard_boats','boat_id');
    }
    
    public function images()
    {
        return $this->hasMany(BoatImage::class,'boat_id');
    }

    public function activity()
    {
        return $this->belongsToMany(Activity::class, 'activity_boats');
    }
}
