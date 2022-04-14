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
        $price = [5000, 10000, 15000,  20000, 50000];

        return [
            'medicine_id' => mt_rand(1,20)  ,
            'treatment_id' =>  mt_rand(1,50) ,
            'amount'  => mt_rand(1,5),
            'total'  => $price[mt_rand(0,4)] * mt_rand(2,5),
        ];
    }
}
