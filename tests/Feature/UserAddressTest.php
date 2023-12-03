<?php

namespace Tests\Feature;

use App\Models\Address;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserAddressTest extends TestCase
{
    use RefreshDatabase;

    public function testAddressBelongsToUser(): void
    {
        $user = \App\Models\User::factory()->create();
        $user->address()->save(Address::factory()->make());

        $address = Address::first();

        $this->assertInstanceOf('App\Models\User', $address->addressable);
    }

    public function testAddressAttentionIsUsersFullName(): void
    {
        $user = \App\Models\User::factory()->create();
        $user->address()->save(Address::factory()->make([
            'attention' => "$user->first_name $user->last_name",
        ]));

        $address = Address::first();

        $this->assertSame(
            "$user->first_name $user->last_name",
            $address->attention
        );
    }

    public function testAddressHasRequiredFields(): void
    {
        $user = \App\Models\User::factory()->create();
        $user->address()->save(Address::factory()->make());

        $address = Address::first();

        $this->assertSame(
            $address->street_address,
            $address->street_address
        );
        $this->assertSame(
            $address->city,
            $address->city
        );
        $this->assertSame(
            $address->state,
            $address->state
        );
        $this->assertSame(
            $address->postal_code,
            $address->postal_code
        );
        $this->assertSame(
            $address->country,
            $address->country
        );
    }
}
