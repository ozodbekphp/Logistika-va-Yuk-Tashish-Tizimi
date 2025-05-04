<?php

namespace Database\Seeders;

use App\Models\Shipment;
use App\Models\User;
use Database\Factories\ShipmentFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Shipment::factory()->count(20)->create();
       $this->call([
        UserSeeder::class,

       ]);

    }
}
