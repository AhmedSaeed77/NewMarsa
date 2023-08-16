<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes,CascadeSoftDeletes;
    use HasFactory;

    protected $cascadeDeletes = ['favourites'];
    protected $fillable = [
        'title',
        'title_de',
        'title_cz',
        'overview',
        'overview_de',
        'overview_cz',
        'includes',
        'includes_de',
        'includes_cz',
        'excludes',
        'excludes_de',
        'excludes_cz',
        'image',
        'availability',
        'time',
        'place_id',
        'how',
        'how_de',
        'how_cz',
        'additionalprice',
        'descriptiuonadditionalprice_en',
        'descriptiuonadditionalprice_de',
        'descriptiuonadditionalprice_cz',
        'slug',
        'latitude',
        'longitude',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function place()
    {
        return $this->belongsTo(Place::class);
    } 

    public function images()
    {
        return $this->hasMany(EventImage::class,'event_id');
    }
    public function favourites()
    {
       return $this->hasMany(FavouriteEvent::class,'event_id');
    }
}
