<?php

namespace Database\Seeders;

use App\Models\Route;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Route::create([
           "user_id" => 1,
           "initial_stop_id" => 1,
           "final_stop_id" => 2,
           "bike_id" => 1,
           "distance" => 500,
           "duration" => 1000,
           "points" => 100,
           "mapbox_response" => '{"routes":[{"geometry":{"coordinates":[[-4.730855,41.653319],[-4.731204,41.653354],[-4.731172,41.653568],[-4.729951,41.653454],[-4.725932,41.652181],[-4.726006,41.652131],[-4.726499,41.65228]],"type":"LineString"},"legs":[{"summary":"","weight":328,"duration":298,"steps":[],"distance":571.6}],"weight_name":"cyclability","weight":328,"duration":298,"distance":571.6}],"waypoints":[{"distance":0.33309312638707467,"name":"","location":[-4.730855,41.653319]},{"distance":1.4233601888820147,"name":"Plaza de la Fuente Dorada","location":[-4.726499,41.65228]}],"code":"Ok","uuid":"34oyDWtItbRpJKZb00E5_J2jmiJlWLfQagPHfulbhv5_2m0FkCUA0g=="}'
        ]);
    }
}
