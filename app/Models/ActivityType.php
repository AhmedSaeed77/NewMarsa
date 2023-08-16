<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityType extends Model
{
    use HasFactory,SoftDeletes,CascadeSoftDeletes;
    protected $cascadeDeletes = ['activities'];
    
    protected $fillable = [
        'type',
        'type_de',
        'type_cz',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
