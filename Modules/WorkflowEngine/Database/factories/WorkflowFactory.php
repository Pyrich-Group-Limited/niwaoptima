<?php

namespace Modules\WorkflowEngine\Database\Factories;

use Modules\WorkflowEngine\Models\Workflow;
use Illuminate\Database\Eloquent\Factories\Factory;

use Modules\WorkflowEngine\Models\WorkflowType;

class WorkflowFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Workflow::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $workflowType = WorkflowType::first();
        if (!$workflowType) {
            $workflowType = WorkflowType::factory()->create();
        }

        return [
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'workflow_name' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'workflow_type_id' => $workflowType->id
        ];
    }
}
