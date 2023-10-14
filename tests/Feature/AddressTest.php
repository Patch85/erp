<?php

namespace Tests\Feature;

use App\Models\Address;
use Database\Seeders\AddressSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddressTest extends TestCase
{
    use RefreshDatabase;

    public function test_address_can_be_instantiated()
    {
        $address = Address::factory()->create();

        $this->assertInstanceOf(Address::class, $address);
    }

    public function test_created_address_exists_in_database()
    {
        $address = Address::factory()->create();

        $this->assertModelExists($address);
    }

    public function test_address_seedier_creates_correct_number_of_records()
    {
        $this->seed(AddressSeeder::class);

        $this->assertDatabaseCount('addresses', 15);
    }
}
