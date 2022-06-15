<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElectricBike extends Bike
{
    use HasFactory;
    protected $table = 'electric_bikes';

    protected $fillable = [
        'id',
        'battery',
    ];
}
