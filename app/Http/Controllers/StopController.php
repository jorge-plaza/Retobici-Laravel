<?php

namespace App\Http\Controllers;

use App\Http\Resources\BikeResource;
use App\Http\Resources\StopResource;
use App\Models\Bike;
use App\Models\ElectricBike;
use App\Models\Reservation;
use App\Models\Stop;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StopController extends Controller
{
    public function getAllStops(){
        return StopResource::collection(Stop::all());
    }

    public function unlockBike(Request $request, Bike $bike){
        $user = UserController::getUserByToken($request);
        $stop = $bike->stop()->first();
        $type = $bike->bikeable_type;
        $bikes = $stop->bikes()->get()->where('bikeable_type', '=', $type);
        $reservation = $user->reservations()->first();
        if ($type=='App\Models\ElectricBike'){
            $typable = 'electric';
        }else{
            $typable = 'pedal';
        }
        if (($reservation!=null && $reservation->bike_type==$typable) || $stop->check_availability_bikes($type)){
            return new BikeResource($bikes->first());
        }else{
            return response()->json("No bikes available", 500);
        }
    }

    public function lockBike(Stop $stop){
        if ($stop->total_spaces>0){
            return new StopResource($stop);
        }
        else{
            return "No space available";
        }
    }

    public function reserveBike(Request $request, Stop $stop, String $type){
        if ($stop->check_availability_bikes($type)){
            $user = UserController::getUserByToken($request);
            $reservation = new Reservation();
            $reservation->user_id = $user->id;
            $reservation->stop_id = $stop->id;
            $reservation->bike_type = $type;
            $reservation->save();
            return new StopResource($stop);
        }
        else{
            return response()->json("No bikes available for reservation", 500);
        }
    }
}
