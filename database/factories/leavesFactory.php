<?php

namespace Modules\Leaves\Database\Factories;

use Modules\Leaves\Models\leaves;
use Illuminate\Database\Eloquent\Factories\Factory;


class leavesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = leaves::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'days' => $this->faker->date('Y-m-d'),
            'title' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'age' => $this->faker->randomDigitNotNull,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
