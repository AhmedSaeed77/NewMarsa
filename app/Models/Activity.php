<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
class Activity extends Model
{
    use HasFactory,SoftDeletes;

    protected $cascadeDeletes = ['activitybooking','favourites'];
    protected $fillable = [
        'title',
        'title_de',
        'title_cz',
        'overview',
        'overview_de',
        'overview_cz',
        'price',
        'image',
        'place',
        'type_id',
        'availability',
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
        'plan',
        'plan_de',
        'plan_cz',
        'shortoverview_en' ,
        'shortoverview_cz' ,
        'shortoverview_de',
        'child_status',
        'price_child',
        'child_age',
        'boat_id',
        'locationimage',
        'popular',
        'additionalprice',
        'slug',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function activity_type()
    {
        return $this->belongsTo(ActivityType::class,'type_id');
    }
    public function place()
    {
        return $this->belongsTo(Place::class,'place_id');
    }

    // public function package()
    // {
    //     return $this->belongsTo(Package::class);
    // }

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_activities');
    }

    public function boats()
    {
        return $this->belongsToMany(Boat::class, 'activity_boats');
    }

    public function activitybooking()
    {
        return $this->hasMany(ActivityBooking::class);
    }
    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }
    public function images()
    {
        return $this->hasMany(ActivityImage::class,'activity_id');
    }

    public function places()
    {
        return $this->belongsToMany(Place::class, 'activity_places');
    }

}
