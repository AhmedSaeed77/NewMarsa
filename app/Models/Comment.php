<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;

class Comment extends Model
{
    use HasFactory;

    use SoftDeletes ; 

    protected $table = 'comments';

    public $fillable = [ 'id' , 'title' , 'content' , 'blog_id' ,'user_id' ];

    //protected $cascadeDeletes = ['replies'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [ 'deleted_at' ];

    public function blog()
    {
        return $this->belongsTo(Blog::class,'blog_id' , 'id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    // public static function boot() {
    //     parent::boot();
    //     self::deleting(function($comment) { 
    //         $comment->replies()->each(function($e) {
    //             $e->delete(); 
    //         });
    //     });
    // }
}
