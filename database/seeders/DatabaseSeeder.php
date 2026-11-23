<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password'=>'password123',
            'role'=>'admin',
        ]);
    Car::create(['brand' => 'Dacia', 'model' => 'Logan', 'price_per_day' => 250]);
    Car::create(['brand' => 'Renault', 'model' => 'Clio', 'price_per_day' => 300]);
    Car::create(['brand' => 'Peugeot', 'model' => '208', 'price_per_day' => 350]);
    Car::create(['brand' => 'Hyundai', 'model' => 'Tucson', 'price_per_day' => 600]);
    Car::create(['brand' => 'Toyota', 'model' => 'Yaris', 'price_per_day' => 320]);
  
    }
    
}
