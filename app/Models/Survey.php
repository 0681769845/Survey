<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'dob',
        'contact_number',
        'favorite_food',
        'movies_rating',
        'radio_rating',
        'eat_out_rating',
        'watch_tv_rating',
    ];
}
