<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formula extends Model
{

    protected $fillable = [

        'name',

        'description',

        'price',

        'duration',

        'min_players',

        'max_players',

        'active',

        'image'

    ];

}
