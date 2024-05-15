<?php

namespace Modules\WorkflowEngine\Database\Factories;

use Modules\WorkflowEngine\Models\WorkflowActivity;
use Illuminate\Database\Eloquent\Factories\Factory;

use Modules\WorkflowEngine\Models\WorkflowStep;
use Modules\WorkflowEngine\Models\User;
use Modules\WorkflowEngine\Models\WorkflowInstance;

class WorkflowActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkflowActivity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $workflowInstance = WorkflowInstance::first();
        if (!$workflowInstance) {
            $workflowInstance = WorkflowInstance::factory()->create();
        }

        return [
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'workflow_step_id' => $workflowStep->id,
            'status' => $this->faker->randomDigitNotNull,
            'user_id' => $user->id,
            'comment' => $this->faker->text(500),
            'action' => $this->faker->randomDigitNotNull,
            'action_date' => $this->faker->date('Y-m-d H:i:s'),
            'workflow_instance_id' => $workflowInstance->id
        ];
    }
}
