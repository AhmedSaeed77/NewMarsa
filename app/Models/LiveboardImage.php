<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LiveboardImage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'image',
        'liveboard_id',       
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function liveboard()
    {
        return $this->belongsTo(LiveBoard::class,'liveboard_id');
    }

}
