<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarImage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'image',
        'indexx',
        'car_id',       
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function car()
    {
        return $this->belongsTo(Car::class,'car_id');
    }
}
