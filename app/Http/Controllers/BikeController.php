<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use Illuminate\Http\Request;

class BikeController extends Controller
{
    public function unlockBike(Bike $bike){
        return true;
    }

    public function reserveBike(Bike $bike){
        return true;
    }
}
