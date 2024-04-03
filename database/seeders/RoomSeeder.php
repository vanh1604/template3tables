<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $types = ["standard", "deluxe", "suite"];
        $status = ["available", "occupied", "under maintaince"];
        for ($i = 0; $i < 10; $i++) {
            # code...
            $faker = Faker::create();
            Room::create([
                "number" => $faker->numberBetween(1, 100),
                "type" => $types[$faker->numberBetween(0, 2)],
                "status" => $status[$faker->numberBetween(0, 2)],
            ]);
        }
    }
}
