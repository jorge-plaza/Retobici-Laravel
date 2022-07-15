<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class UnlockBikeTest extends TestCase
{
    private const BIKEID = 1;
    private const ENDPOINT = "/api/stops/1/unlock";
    private const LOGIN = "/api/login";
    private const PASSWORD = "123456";
    private const EMAIL = "jorge@uva.es";

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_check_unlocking_availability_endpoint()
    {
        $login = $this->postJson(self::LOGIN, [
            'email' => self::EMAIL,
            'password' => self::PASSWORD
        ]);
        $token = $login->json('token');
        $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
            'Accept' => 'application/json'
        ])
            ->postJson(self::ENDPOINT)
            ->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) =>
            $json
                ->where('bike_id', self::BIKEID)
                ->where('unlocked', false)
                ->etc()
            );
    }
}
