<?php

namespace Tests\Feature\Addresses;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserAddressControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_store_user_address(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post("/profile/{$user->id}/address", [
                'attention' => $user->fullName(),
                'description' => 'Home Address',
                'street_1' => $this->faker->streetAddress,
                'street_2' => $this->faker->secondaryAddress,
                'city' => $this->faker->city,
                'state' => $this->faker->state,
                'postal_code' => $this->faker->postcode,
                'country_code' => $this->faker->countryIsoAlpha3,
            ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('addresses', [
            'addressable_type' => User::class,
            'addressable_id' => $user->id,
            'attention' => $user->fullName(),
            'description' => 'Home Address',
        ]);
    }
}
