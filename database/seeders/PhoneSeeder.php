<?php

namespace Database\Seeders;

use App\Models\Phone;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            Phone::create([
                'name' => Str::random(6),
                'email' => Str::random(3) . '@gmail.com',
                'phone' => +8801754100439
            ]);
        }
    }
}
