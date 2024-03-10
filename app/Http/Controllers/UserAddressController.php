<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UserAddressController extends Controller
{
    public function store(AddressRequest $request, User $user): RedirectResponse
    {
        $user->address()->create($request->validated());

        return redirect()->back();
    }
}
