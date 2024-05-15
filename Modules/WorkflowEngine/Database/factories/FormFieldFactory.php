<?php

namespace Modules\WorkflowEngine\Database\Factories;

use Modules\WorkflowEngine\Models\FormField;
use Illuminate\Database\Eloquent\Factories\Factory;

use Modules\WorkflowEngine\Models\Form;
use Modules\WorkflowEngine\Models\FieldType;

class FormFieldFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FormField::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $fieldType = FieldType::first();
        if (!$fieldType) {
            $fieldType = FieldType::factory()->create();
        }

        return [
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'form_id' => $form->id,
            'field_name' => $this->faker->firstName,
            'field_type_id' => $fieldType->id,
            'field_label' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'field_options' => $this->faker->text(500),
            'is_required' => $this->faker->randomDigitNotNull
        ];
    }
}
