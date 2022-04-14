<?php

namespace Database\Factories;

use App\Models\MedicineTreatment;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicineTreatmentFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MedicineTreatment::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'medicine_id' => mt_rand(1,20)  ,
            'treatment_id' =>  mt_rand(1,50) ,
            'amount'  => mt_rand(100,200),
        ];
    }
}
