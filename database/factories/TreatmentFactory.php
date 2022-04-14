<?php

namespace Database\Factories;

use App\Models\Treatment;
use Illuminate\Database\Eloquent\Factories\Factory;

class TreatmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Treatment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_id' => mt_rand(1,50),
            'doctor_id' => mt_rand(1,10),
            'complaints' => $this->faker->text  ,
            'diagnostic' => $this->faker->text  ,
            'result' => $this->faker->text  ,
        ];
    }
}
