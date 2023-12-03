<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //For each User, seed an address
        \App\Models\User::all()->each(function ($user) {
            $user->address()->save(Address::factory()->make(
                [
                    'attention' => "$user->first_name $user->last_name",
                ]
            ));
        });

    }
}
