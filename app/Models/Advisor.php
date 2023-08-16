<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisor extends Model
{
    use HasFactory;

    //protected $cascadeDeletes = ['activitybooking','favourites'];
    protected $table = 'advisors';
    protected $fillable = [
        'name',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function images()
    {
        return $this->hasMany(AdvisorImage::class,'advisor_id');
    }
}
