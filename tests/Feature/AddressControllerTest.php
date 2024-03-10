<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddressControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_address(): void
    {
        $user = User::factory()->create();

        $user->address()->save(
            Address::factory()->make([
                'addressable_type' => User::class,
                'addressable_id' => $user->id,
                'attention' => $user->fullName(),
                'description' => 'Home Address',
            ])
        );
        $address = $user->address()->first();

        $response = $this
            ->actingAs($user)
            ->patch("/addresses/{$address->id}", [
                'description' => 'New Description',
                'attention' => $address->attention,
                'street_1' => $address->street_1,
                'street_2' => $address->street_2,
                'city' => $address->city,
                'state' => $address->state,
                'postal_code' => $address->postal_code,
                'country_code' => $address->country_code,
            ]);

        $response->assertRedirect();

        $address->refresh();

        $this->assertSame('New Description', $address->description);
    }

    public function test_delete_address(): void
    {
        $user = User::factory()->create();

        $user->address()->save(
            Address::factory()->make([
                'addressable_type' => User::class,
                'addressable_id' => $user->id,
                'attention' => $user->fullName(),
                'description' => 'Home Address',
            ])
        );
        $address = $user->address()->first();

        $response = $this->actingAs($user)->delete("/addresses/{$address->id}");
        $response->assertRedirect();

        $this->assertDatabaseMissing('addresses', [
            'id' => $address->id,
        ]);
    }
}
