<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory;

    use SoftDeletes,CascadeSoftDeletes;

   
    protected $fillable = [
        'name_en',
        'name_de',
        'name_cz',
        'duration',
        'descount',
        'price',
        'transport',
        'price,child',
        'image',
        'description_en',
        'description_de',
        'description_cz',  
        'slug',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function activities()
    {
         return $this->belongsToMany(Activity::class, 'package_activities');
    }

    public function images()
    {
        return $this->hasMany(PackageImage::class,'package_id');
    }
}
