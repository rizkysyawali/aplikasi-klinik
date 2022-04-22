<?php

namespace Database\Factories;

use App\Models\Medicine;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Medicine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $price = [5000, 10000, 15000,  20000, 50000];
        $unit = ['btl', 'bks', 'strip', 'pcs'];
        return [
            'name'    => $this->faker->numerify('obat-##'),
            'unit'    => $unit[mt_rand(0,3)],
            'stock'   => mt_rand(10,50),
            'price'   => $price[mt_rand(0,4)],
            'expired' => $this->faker->dateTimeInInterval($date = '+1 years', $interval = '+2 years', $timezone = 'Asia/Jakarta')
        ];
    }
}
