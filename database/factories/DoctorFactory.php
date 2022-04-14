<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $spec = ['Kandungan','Umum'];
        return [
            'name' => $this->faker->name(),
            'specialist' => $spec[mt_rand(0,1)],
        ];
    }
}
