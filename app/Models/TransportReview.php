<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransportReview extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'transport_reviews';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
