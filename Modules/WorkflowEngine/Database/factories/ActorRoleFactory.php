<?php

namespace Modules\WorkflowEngine\Database\Factories;

use Modules\WorkflowEngine\Models\ActorRole;
use Illuminate\Database\Eloquent\Factories\Factory;


class ActorRoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ActorRole::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'actor_role' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
