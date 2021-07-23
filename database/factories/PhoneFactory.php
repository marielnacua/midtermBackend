<?php

namespace Database\Factories;

use App\Models\Phone;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Phone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'phone_name' => $this->faker->randomElement([
                'Oppo',
                'Samsung',
                'Cherry Mobile',
                'Vivo',
                'Iphone',
                'Realme',
                'Nokia',
                'LG',
                'Xiaomi',
                'My Phone',
                'Black Berry',
                'Alcatel',
                'Sony',
                'Techno',
                'Poco',
                'Honor',
                'Redmi',
                'Redmi Note',
                'Samsung 3210',
                'Galaxy Tabe',
            ]),
            'description' => $this->faker->word(),
            'ram' => $this->faker->numberBetween(1,32),
            'battery' => $this->faker->numberBetween(3000,75000),
            'price' => $this->faker->numberBetween(5000,50000),
            'acquired_on' => $this->faker->date()
        ];
    }
}
