<?php

namespace Tests\Unit;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use Tests\TestCase;

class AddressRequestTest extends TestCase
{
    /**
     * Test the address request has validation rules for each fillable property of the Address model.
     * This test will fail if a property is added to the Address model's fillable
     * array without adding a corresponding rule to the AddressRequest.
     */
    public function test_address_request_has_validation_rules()
    {
        $request = new AddressRequest();
        $rules = $request->rules();
        $fillable = (new Address)->getFillable();

        foreach ($fillable as $field) {
            $this->assertArrayHasKey($field, $rules);
        }
    }
}
