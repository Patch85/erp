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
        Address::factory(10)->create();

        Address::factory(5)->create([
            'line_2' => null,
        ]);
    }
}
