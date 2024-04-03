<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 10; $i++) {
            # code...
            $faker = Faker::create();
           Booking::create([
                "customerID" => $faker->numberBetween(1, 10),
                "roomID" => $faker->numberBetween(1, 10),
                "checkIn" => $faker->date(),
                "checkOut" => $faker->date(),
            ]);
        }
        //
    }
}
