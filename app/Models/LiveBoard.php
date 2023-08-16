<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LiveBoard extends Model
{
    use HasFactory,SoftDeletes,CascadeSoftDeletes;
    protected $cascadeDeletes = ['schedules'];
    protected $fillable = [
        'title',
        'title_de',
        'title_cz',
        'overview',
        'overview_de',
        'overview_cz',
        'price',
        'image',
        //'place_id',
        'activity_type_id',
        'date_from',
        'date_to',
        'additional_cost',
        'terms_and_conditions',
        'terms_and_conditions_de',
        'terms_and_conditions_cz',
        'highlights',
        'highlights_de',
        'highlights_cz',
        'faqs',
        'faqs_de',
        'faqs_cz',
        'faqs_answer',
        'faqs_answer_de',
        'faqs_answer_cz',
        'includes',
        'includes_de',
        'includes_cz',
        'exclude',
        'exclude_de',
        'exclude_cz',
        'rating',
        'duration',
        'plan',
        'plan_de',
        'plan_cz',
        'boat_id',
        'locationimage',
        'slug',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    // public function Place()
    // {
    //     return $this->belongsTo(Place::class,'place_id');
    // }
    
    public function images()
    {
        return $this->hasMany(LiveboardImage::class,'liveboard_id');
    }
    public function schedules()
    {
        return $this->hasMany(LiveboardSchedule::class,'live_id');
    }

   
    public function boat()
    {
        return $this->belongsToMany(Boat::class,'liveboard_boats','liveboard_id');
    }

    public function places()
    {
        return $this->belongsToMany(Place::class,'livaboard_places','liveboard_id','place_id');
    }
    
}
