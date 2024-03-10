<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AddressController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function update(AddressRequest $request, Address $address): RedirectResponse
    {
        $address->update($request->validated());

        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $address->delete();

        return Redirect::back();
    }
}
