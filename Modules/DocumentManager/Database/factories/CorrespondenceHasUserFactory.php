<?php

namespace Modules\DocumentManager\Database\Factories;

use Modules\DocumentManager\Models\CorrespondenceHasUser;
use Illuminate\Database\Eloquent\Factories\Factory;


class CorrespondenceHasUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CorrespondenceHasUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'correspondence_id' => $this->faker->numberBetween(0, 999),
            'user_id' => $this->faker->numberBetween(0, 999),
            'assigned_by' => $this->faker->numberBetween(0, 999),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
