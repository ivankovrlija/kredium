<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ClientTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_clients()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/clients');

        $response->assertViewHas('clients');
    }
}
