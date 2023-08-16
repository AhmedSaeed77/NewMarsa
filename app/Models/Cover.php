<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cover extends Model
{
    use HasFactory;

    protected $table = 'covers';
    protected $fillable = [
        'contact_image',
        'about_image',
        'event_image',
        'singleevent_image',
        'blog_image',
        'transfer_image',
        'liveaboard_image',
        'exploredestination_image',
        'package_image',
        'contact_imageph',
        'about_imageph',
        'event_imageph',
        'singleevent_imageph',
        'blog_imageph',
        'transfer_imageph',
        'liveaboard_imageph',
        'exploredestination_imageph',
        'package_imageph',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
