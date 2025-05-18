<?php

namespace Tests\Feature;

use App\Models\Doctor;
use App\Models\Service;
use App\Models\Specialty;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{

    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Specialty::factory()->count(5)->create();
        Service::factory()->count(5)->create();
        Doctor::factory()->count(10)->create();
    }

    public function test_search_doctors_returns_results()
    {
        $doctor = Doctor::factory()->create(['name' => 'Dr John']);

        $response = $this->getJson('/home/search-doctors?doctor_name=John');

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'Dr John']);
    }

    public function test_get_all_services_returns_services()
    {
        $service = Service::factory()->create(['name' => 'General Checkup']);

        $response = $this->getJson('/home/services');

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => 'General Checkup']);
    }

    public function test_get_special_offers_returns_filtered_services()
    {
        $serviceWithOffer = Service::factory()->create(['remaining_count' => 5]);
        Service::factory()->create(['remaining_count' => 0]);

        $response = $this->getJson('/home/special-offers');

        $response->assertStatus(200)
                 ->assertJsonFragment(['id' => $serviceWithOffer->id])
                 ->assertJsonMissing(['remaining_count' => 0]);
    }

    public function test_get_top_specialities_returns_results()
    {
        $speciality = Specialty::factory()->create();
        $response = $this->getJson('/home/top-specialities');

        $response->assertStatus(200);
        $data = $response->json();
        $this->assertLessThanOrEqual(10, count($data));    }
}
