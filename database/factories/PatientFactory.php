<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gen = ['Laki-laki', 'Perempuan'];
        return [
            'name' => $this->faker->name(),
            'gender'  => $gen[mt_rand(0,1)],
            'age'  => mt_rand(10,40),
            'address'  => $this->faker->address,
        ];
    }
}
