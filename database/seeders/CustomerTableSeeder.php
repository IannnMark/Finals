<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as faker;

use App\Models\Customer;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,50) as $index){
            Customer::create([
              
                'lname' => $faker->lastName(),
                'fname' => $faker->firstName($gender = 'others'|'male'|'female'),
                'address' => $faker->address(),
                'phone'=> $faker->phoneNumber(), 
                'image'=> $faker->image(), 
                ]);
        }
    }
}
