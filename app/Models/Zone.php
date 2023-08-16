<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zone extends Model
{
    use HasFactory,SoftDeletes,CascadeSoftDeletes;
    protected $cascadeDeletes = ['hotels'];
    protected $fillable = [
        'name',
        'marsa_hs',
        'hurgada_hs',
        'marsa_limo',
        'hurgada_limo',
        'added_hs_per_person',
        'longitude',
        'latitude'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }
}
