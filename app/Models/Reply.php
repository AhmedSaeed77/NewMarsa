<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;

class Reply extends Model
{
    use HasFactory;

    use SoftDeletes ; 

    protected $table = 'replies';

    //protected $cascadeDeletes = ['comment'];

    public $fillable = [ 'id' , 'title' , 'content' , 'comment_id' , 'blog_id' ];

    protected $dates = [ 'deleted_at' ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // public function blog()
    // {
    //     return $this->belongsTo(Blog::class);
    // }
}
