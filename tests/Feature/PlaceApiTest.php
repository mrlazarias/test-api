<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Place;

class PlaceApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_list_places()
    {
        Place::factory()->count(3)->create();
        $response = $this->getJson('/api/places');
        $response->assertStatus(200)->assertJsonCount(3, 'data');
    }

    public function test_can_filter_places_by_name()
    {
        Place::factory()->create(['name' => 'Unique Place']);
        Place::factory()->create(['name' => 'Other Place']);
        $response = $this->getJson('/api/places?name=Unique');
        $response->assertStatus(200)->assertJsonFragment(['name' => 'Unique Place']);
    }

    public function test_can_show_place()
    {
        $place = Place::factory()->create();
        $response = $this->getJson('/api/places/'.$place->id);
        $response->assertStatus(200)->assertJsonFragment(['id' => $place->id]);
    }

    public function test_can_create_place()
    {
        $data = [
            'name' => 'Test Place',
            'city' => 'Test City',
            'state' => 'TS',
        ];
        $response = $this->postJson('/api/places', $data);
        $response->assertStatus(201)->assertJsonFragment(['name' => 'Test Place']);
        $this->assertDatabaseHas('places', ['name' => 'Test Place']);
    }

    public function test_can_update_place()
    {
        $place = Place::factory()->create();
        $data = [
            'name' => 'Updated Name',
            'city' => 'Updated City',
            'state' => 'UP',
        ];
        $response = $this->putJson('/api/places/'.$place->id, $data);
        $response->assertStatus(200)->assertJsonFragment(['name' => 'Updated Name']);
        $this->assertDatabaseHas('places', ['name' => 'Updated Name']);
    }
}
