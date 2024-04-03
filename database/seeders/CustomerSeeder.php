<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            # code...
            $faker = Faker::create();
            Customer::create([
                "name" => $faker->name,
                "email" => $faker->email,
                "phone" => $faker->phoneNumber,
            ]);
        }
        //
    }
}
