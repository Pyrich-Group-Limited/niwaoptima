<?php

namespace Modules\Shared\Database\Factories;

use Modules\Shared\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;


class BranchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Branch::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'branch_name' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'branch_region' => $this->faker->numberBetween(0, 999),
            'branch_code' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'last_ecsnumber' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'highest_rank' => $this->faker->numberBetween(0, 999),
            'staff_strength' => $this->faker->numberBetween(0, 999),
            'managing_id' => $this->faker->numberBetween(0, 999),
            'branch_email' => $this->faker->email,
            'branch_phone' => $this->faker->numerify('0##########'),
            'branch_address' => $this->faker->address,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
