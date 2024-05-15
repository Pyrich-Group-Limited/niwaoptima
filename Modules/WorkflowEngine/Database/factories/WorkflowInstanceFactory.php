<?php

namespace Modules\WorkflowEngine\Database\Factories;

use Modules\WorkflowEngine\Models\WorkflowInstance;
use Illuminate\Database\Eloquent\Factories\Factory;

use Modules\WorkflowEngine\Models\Workflow;
use Modules\WorkflowEngine\Models\User;

class WorkflowInstanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkflowInstance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $user = User::first();
        if (!$user) {
            $user = User::factory()->create();
        }

        return [
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'workflow_id' => $workflow->id,
            'started_by' => $user->id,
            'date_completed' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
