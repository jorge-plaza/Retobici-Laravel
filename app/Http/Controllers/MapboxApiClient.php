<?php

namespace App\Http\Controllers;

use App\Models\Stop;
use Illuminate\Support\Facades\Http;

class MapboxApiClient extends Http
{
    private String $url;
    public function __construct(Stop $init, Stop $end)
    {
        $lng1 = $init->lng;
        $lng2 = $end->lng;
        $lat1 = $init->lat;
        $lat2 = $end->lat;
        $coordinates = $lng1.",".$lat1.";".$lng2.",".$lat2;
        $token = env('MAPBOX_TOKEN', null);
        $this->url = "https://api.mapbox.com/directions/v5/mapbox/cycling/${coordinates}?alternatives=false&geometries=geojson&overview=full&steps=false&access_token=".$token;
    }
    public function buildRequest(){
        return $this->url;
    }
}