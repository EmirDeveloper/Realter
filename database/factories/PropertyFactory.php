<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\OwnerType;
use App\Models\PropertyType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $location = Location::doesntHave('child')->inRandomOrder()->first();
        $owner_type = OwnerType::inRandomOrder()->first();
        $property_type = PropertyType::inRandomOrder()->first();
        $nameTm = fake()->streetSuffix();
        $nameEn = null;

        return [
            'location_id' => $location->id,
            'owner_type_id' => $owner_type->id,
            'property_type_id' => $property_type->id,
            'name_tm' => $nameTm,
            'name_en' => $nameEn,
            'credit' => fake()->boolean(40),
            'repair' => fake()->boolean(40),
            'rent' => fake()->boolean(40),
            'documents' => fake()->boolean(60),
            'viewed' => rand(0, 500),
            'price' => fake()->randomFloat($nbMaxDecimals = 1, $min = 100000000, $max = 900000000),
            'description' => fake()->text($maxNbChars = rand(100, 300)),
            'area' => rand(10, 20)
        ];
    }
}
