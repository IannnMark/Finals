<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as faker;

use App\Models\Service;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,50) as $index) {
            Service::create([
                'service_description' => $faker->word(),
                'service_cost' => $faker->numberBetween($min = 1000, $max = 9000),
                'image'=> $faker->image(),
                ]);
        }
    }
}
