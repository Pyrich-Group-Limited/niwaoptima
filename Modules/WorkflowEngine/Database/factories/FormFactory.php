<?php

namespace Modules\WorkflowEngine\Database\Factories;

use Modules\WorkflowEngine\Models\Form;
use Illuminate\Database\Eloquent\Factories\Factory;


class FormFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Form::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'form_name' => $this->faker->firstName,
            'has_workflow' => $this->faker->randomDigitNotNull,
            'workflow_id' => $this->faker->randomDigitNotNull
        ];
    }
}
