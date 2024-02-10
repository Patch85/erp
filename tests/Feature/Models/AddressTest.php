<?php

namespace Tests\Feature\Models;

use App\Models\Address;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddressTest extends TestCase
{
    use RefreshDatabase;

    public function test_address_can_be_created(): void
    {
        $address = Address::factory()->create([
            'addressable_id' => 1,
            'addressable_type' => 'App\Models\User',
        ]);

        $this->assertEquals(1, $address->addressable_id);
    }

    public function test_address_can_be_updated(): void
    {
        $address = Address::factory()->create([
            'addressable_id' => 1,
            'addressable_type' => 'App\Models\User',
            'attention' => 'Old Attention',
        ]);

        $address->update(['attention' => 'New Attention']);
        $address->refresh();

        $this->assertEquals('New Attention', $address->attention);
    }

    public function test_addressable_id_cannot_be_updated(): void
    {
        $address = Address::factory()->create([
            'addressable_id' => 1,
            'addressable_type' => 'App\Models\User',
        ]);

        $address->update(['addressable_id' => 2]);
        $address->refresh();

        $this->assertEquals(1, $address->addressable_id);
    }

    public function test_addressable_type_cannot_be_updated(): void
    {
        $address = Address::factory()->create([
            'addressable_id' => 1,
            'addressable_type' => 'App\Models\User',
        ]);

        $address->update(['addressable_type' => 'App\Models\Company']);
        $address->refresh();

        $this->assertEquals('App\Models\User', $address->addressable_type);
    }

    public function test_address_can_be_deleted(): void
    {
        $address = Address::factory()->create([
            'addressable_id' => 1,
            'addressable_type' => 'App\Models\User',
        ]);

        $this->assertModelExists($address);

        $address->delete();
        $address->refresh();

        $this->assertModelMissing($address);
    }

    public function test_addressable_relationship(): void
    {
        $user = User::factory()->create();

        $address = $user->address()->create([
            'addressable_type' => 'App\Models\User',
            'addressable_id' => $user->id,
            'attention' => $user->fullName(),
            'street_1' => '123 Main St',
            'city' => 'Anytown',
            'state' => 'NY',
            'postal_code' => '12345',
            'country_code' => 'USA',
        ]);

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Relations\MorphTo', $address->addressable());
        $this->assertEquals($user->id, $address->addressable->id);
    }
}
