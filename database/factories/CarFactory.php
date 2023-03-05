<?php

namespace Database\Factories;

use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $this->faker->addProvider(new Fakecar($this->faker));
        $vehicle = $this->faker->vehicleArray();

        return [

//            'reg_number' => str_replace('-', '', $this->faker->vehicleRegistration),
//            'reg_number'=> fake()->regexify('[A-Z]{3}[0-9]{3}'),
            'reg_number' => strtoupper(fake()->bothify('???###')),
            'brand' => $vehicle['brand'],
            'model' => $vehicle['model'],
//            'owner_id' => '1'
        ];
    }
}
