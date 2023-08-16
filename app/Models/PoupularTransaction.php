<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoupularTransaction extends Model
{
    use HasFactory;

    protected $table = 'poupular_transactions';
    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
