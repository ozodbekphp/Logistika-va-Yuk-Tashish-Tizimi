<?php

namespace Database\Factories;

use App\Models\Shipment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shipment>
 */
class ShipmentFactory extends Factory
{
    protected $model = Shipment::class;
    
    public function definition(): array
    {

        return [
            'user_id' => fake()->numberBetween(1 , 200),
            'name' => fake()->name(),
            'weight' => fake()->numberBetween(1 , 30),
            'size' => fake()->numberBetween(1, 12),
            'yuk_olish_joyi' => fake()->address(),
            'yuk_qabul_qilish_joyi' => fake()->address(),
            'shipment_id' => fake()->country()
        ];
    }
}
