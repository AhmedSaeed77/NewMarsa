<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityImage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'image',
        'indexx',
        'activity_id',       
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function activity()
    {
        return $this->belongsTo(Activity::class,'activity_id');
    }

}
