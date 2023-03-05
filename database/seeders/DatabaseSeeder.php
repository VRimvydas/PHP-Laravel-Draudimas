<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Car;
use App\Models\Owner;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

//        Owner::factory()->count(2)->create();
//        Car::factory()->count(5)->create();

//        Owner::factory()->count(100)->has(Car::factory()->count(rand(1,3)))->create();
//        Owner::factory()->count(100)->hasCars(rand(1,3))->create();
        Owner::factory(5)->hasCars(rand(1,3))->create();


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
