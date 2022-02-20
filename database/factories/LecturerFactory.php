<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lecturer>
 */
class LecturerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'nidn' => $this->faker->unique()->randomNumber(7,true),
            'address' => $this->faker->address(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'sex' => $this->faker->randomElement(['male','female']),
            'blood' => $this->faker->randomElement(['A','B','O','AB']),
            'religion' => $this->faker->randomElement(['buddha','kristen','islam']),
            'status' => $this->faker->randomElement(['belum menikah','menikah']),
            'pob' => $this->faker->randomElement(['Medan','Jakarta','Surabaya']),
            'dob' => $this->faker->date('Y-m-d'),
        ];
    }
}
