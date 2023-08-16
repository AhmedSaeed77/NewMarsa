<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes,CascadeSoftDeletes;
    protected $cascadeDeletes = ['comments','reviews','activityBooking','favourites'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    //protected $table='';
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
        'phone',
        'image',
        'provider',
        'provider_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function comments()
    {
        return $this->hasMany(Comment::class,'user_id');
    }
    public function reviews()
    {
        return $this->hasMany(Reviews::class);
    }
    public function transportReviews()
    {
        return $this->hasMany(TransportReview::class);
    }
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function activityBooking()
    {
        return $this->hasMany(ActivityBooking::class);
    }
    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }
    public function routeNotificationForVonage($notification)
    {
        return $this->phone;
    }
}
