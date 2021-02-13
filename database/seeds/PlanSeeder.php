<?php

use App\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'slug' => 'monthly',
            'price' => 1200, //12.00
            'duration_in_days' => 30,
        ]);

        Plan::create([
            'slug' => 'yearly',
            'price' => 9999, //99.99
            'duration_in_days' => 365,
        ]);
    }
}
