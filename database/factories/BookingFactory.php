<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;


class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'departure_time' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'departure_day' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'departure_state' => $this->faker->numberBetween(0, 999),
            'no_of_passengers' => $this->faker->numberBetween(0, 999),
            'trip_duration' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'trip_type' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'price' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'arrival_time' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'arrival_day' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'arrival_state' => $this->faker->numberBetween(0, 999),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
