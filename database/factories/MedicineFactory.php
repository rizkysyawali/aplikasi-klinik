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
        $med = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];
        $price = [5000, 10000, 15000,  20000, 50000];
        $unit = ['botol', 'bungkus', 'strip', 'buah'];
        return [
            'name'    => 'Obat '.$med[mt_rand(0,5)],
            'unit'    => $unit[mt_rand(0,3)],
            'stock'   => mt_rand(10,50),
            'price'   => $price[mt_rand(0,4)],
            'expired' => $this->faker->dateTimeBetween($startDate = '+1 years', $endDate = '+2 years', $timezone = 'Asia/Jakarta')
        ];
    }
}
