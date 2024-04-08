<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nik' => $this->faker->numberBetween(1, 100),
            'kk' => $this->faker->numberBetween(1, 100),
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'gender' => $this->faker->word(),
            'birth_place' => $this->faker->city(),
            'birth_date' => $this->faker->date(),
            'is_deceased' => false,
            'address_line' => $this->faker->address(),
            'city' => $this->faker->city(),
            'city_code' => $this->faker->numberBetween(1, 50),
            'province'=> $this->faker->word(),
            'province_code' => $this->faker->numberBetween(1, 30),
            'district' => $this->faker->word(),
            'district_code' => $this->faker->numberBetween(1, 100),
            'village' => $this->faker->word(),
            'village_code' => $this->faker->numberBetween(1, 100),
            'rt' => $this->faker->numberBetween(1, 100),
            'rw' => $this->faker->numberBetween(1, 100),
            'postal_code' => $this->faker->postcode(),
            'marital_status' => $this->faker->word(),
            'relationship_name' => $this->faker->name(),
            'relationship_phone' => $this->faker->phoneNumber(),
        ];
    }
}
