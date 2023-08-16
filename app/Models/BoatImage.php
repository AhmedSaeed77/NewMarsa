<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoatImage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'image',
        'boat_id',       
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function boat()
    {
        return $this->belongsTo(Boat::class,'boat_id');
    }

}
