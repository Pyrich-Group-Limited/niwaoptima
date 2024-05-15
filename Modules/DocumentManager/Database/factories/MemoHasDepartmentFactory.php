<?php

namespace Modules\DocumentManager\Database\Factories;

use Modules\DocumentManager\Models\MemoHasDepartment;
use Illuminate\Database\Eloquent\Factories\Factory;


class MemoHasDepartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MemoHasDepartment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'memo_id' => $this->faker->numberBetween(0, 999),
            'department_id' => $this->faker->numberBetween(0, 999),
            'assigned_by' => $this->faker->numberBetween(0, 999),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
