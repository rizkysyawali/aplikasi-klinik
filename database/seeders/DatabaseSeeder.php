<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Doctor::factory(10)->create();
        \App\Models\Patient::factory(5000)->create();
        \App\Models\Treatment::factory(50)->create();
        \App\Models\Medicine::factory(10)->create();
        \App\Models\MedicineTreatment::factory(3)->create();

    }
}
