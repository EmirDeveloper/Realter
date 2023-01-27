<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use App\Models\Property;
use App\Models\Verification;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            LocationSeeder::class,
            OwnerTypeSeeder::class,
            PropertyTypeSeeder::class,
            OptionSeeder::class
        ]);

        Property::factory()->count(100)->create();

        for ($i = 0; $i < 50; $i++) {
            $verification = Verification::factory()->create();
            if ($verification->status) {
                Customer::factory()
                   ->count(rand(1, 2))
                    ->create([
                        'name' => $verification->phone,
                        'password' => bcrypt($verification->code),
                        'created_at' => $verification->created_at,
                    ]);
            }
        }
    }
}
