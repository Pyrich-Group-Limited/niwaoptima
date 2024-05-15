<?php

namespace Modules\WorkflowEngine\Database\Factories;

use Modules\WorkflowEngine\Models\WorkflowStep;
use Illuminate\Database\Eloquent\Factories\Factory;

use Modules\WorkflowEngine\Models\WorkflowStep;
use Modules\WorkflowEngine\Models\WorkflowStep;
use Modules\WorkflowEngine\Models\WorkflowStep;
use Modules\WorkflowEngine\Models\ActorType;
use Modules\WorkflowEngine\Models\ActorRole;
use Modules\WorkflowEngine\Models\StepActivity;
use Modules\WorkflowEngine\Models\StepType;

class WorkflowStepFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkflowStep::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $stepType = StepType::first();
        if (!$stepType) {
            $stepType = StepType::factory()->create();
        }

        return [
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'workflow_id' => $this->faker->randomDigitNotNull,
            'step_order' => $this->faker->randomDigitNotNull,
            'parent_step_id' => $workflowStep->id,
            'next_approved_id' => $workflowStep->id,
            'next_rejected_id' => $workflowStep->id,
            'actor_type_id' => $actorType->id,
            'actor_role_id' => $actorRole->id,
            'step_activity_id' => $stepActivity->id,
            'step_type_id' => $stepType->id,
            'step_name' => $this->faker->lastName
        ];
    }
}
