<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory;

    use SoftDeletes; 

    protected $table = 'blogs';

    public $fillable = [ 'id' , 'image' , 'title_en' , 'content_en', 'title_de' , 'content_de', 'title_cz' , 'content_cz' ,'slug' ];

    //protected $cascadeDeletes = ['comments','replys'];

    protected $dates = [ 'deleted_at' ];
    
    protected $hidden = [
        'updated_at',
        'deleted_at',
        'admin_id' ,
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'blog_id','id');
    }
    public function replys()
    {
        return $this->hasMany(reply::class);
    }
    public function images()
    {
        return $this->hasMany(BlogImage::class,'blog_id');
    }
}
