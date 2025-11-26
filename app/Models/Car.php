<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
    'number',
    'brand',
    'type',
    'year',
    'gas',
    'capacity',
    'price_per_day',
    'foto'
];

}
