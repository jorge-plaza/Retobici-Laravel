<?php

namespace Tests\Unit;

use App\Http\Controllers\RouteController;
use App\Models\Route;
use PHPUnit\Framework\TestCase;
use function dump;

class RouteControllerTest extends TestCase
{
    public function test_calculate_points(){
        $route = new Route();
        $route->distance = 1000;
        $route->duration = 600;
        $points = RouteController::calculatePoints($route);
        dump($points);
    }
}
