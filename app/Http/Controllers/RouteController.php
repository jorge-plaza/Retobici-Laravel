<?php

namespace App\Http\Controllers;

use App\Http\Resources\RouteResource;
use App\Models\Bike;
use App\Models\ElectricBike;
use App\Models\Route;
use App\Models\Stop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\Cast\Int_;

class RouteController extends Controller
{
    public function createRoute(Request $request, Bike $bike){
        $user = UserController::getUserByToken($request);
        $route = new Route;
        $route->user_id = $user->id;
        $route->initial_stop_id = $bike->stop()->first()->id;
        $route->bike_id = $bike->id;
        $route->save();
        //Remove any user reservation
        $reservation = $user->reservations()->first();
        $reservation?->delete();
        //Free the bike from the Stop
        $bike->stop_id = null;
        $bike->save();

        return new RouteResource($route);
    }

    public function finishRoute(Request $request){
        $route = Route::find($request->id);
        if($request->missing(['duration', 'final_stop'])){
            //TODO manage Errors
            return false;
        }

        $initial_stop = Stop::find($route->initial_stop_id);
        $final_stop = Stop::find($request->final_stop);
        $mapboxClient = new MapboxApiClient($initial_stop,$final_stop);
        $url = $mapboxClient->buildRequest();
        $response = Http::get($url);
        $mapbox_response = $response->json();
        $distance = $response->json('routes')[0]['distance'];
        $estimated_duration = $response->json('routes')[0]['duration'];

        $route->final_stop_id = intval($request->final_stop);
        $route->duration = intval($request->duration);
        $route->mapbox_response = $mapbox_response;
        $route->distance = intval($distance);
        $route->estimated_duration = intval($estimated_duration);
        $route->points = $this->calculatePoints($route);
        $route->save();

        $user = UserController::getUserByToken($request);
        $user->points += $route->points;
        $user->save();

        $bike = $route->bike()->first();
        $bike->stop_id = $route->final_stop_id;
        $bike->save();

        return new RouteResource($route);
    }

    private function calculatePoints($route): Int{
        return 50;
    }
}
