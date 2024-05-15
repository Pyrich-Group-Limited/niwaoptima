<?php

namespace Modules\DocumentManager\Database\Factories;

use Modules\DocumentManager\Models\Correspondence;
use Illuminate\Database\Eloquent\Factories\Factory;


class CorrespondenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Correspondence::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'subject' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'date' => $this->faker->date('Y-m-d H:i:s'),
            'sender' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'reference_number' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'description' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'comments' => $this->faker->text(500),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
