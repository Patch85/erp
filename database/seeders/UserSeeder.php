<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (config('app.env') == 'local') {
            \App\Models\User::factory()->create([
                'first_name' => config('dev.first_name'),
                'middle_name' => config('dev.middle_name'),
                'last_name' => config('dev.last_name'),
                'display_name' => config('dev.display_name'),
                'email' => config('dev.email'),
                'password' => Hash::make(config('dev.password')),
            ]);
        }

        \App\Models\User::factory(10)->create();

    }
}
