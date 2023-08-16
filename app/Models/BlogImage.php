<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogImage extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'image',
        'blog_id',       
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function blog()
    {
        return $this->belongsTo(Blog::class,'blog_id');
    }
}
