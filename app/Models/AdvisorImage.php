<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvisorImage extends Model
{
    use HasFactory;
    protected $table = 'advisor_images';
    protected $fillable = [
        'image',
        'advisor_id'
        
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function activity()
    {
        return $this->belongsTo(Advisor::class,'advisor_id');
    }
}
