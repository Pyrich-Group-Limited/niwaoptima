<?php

namespace Modules\EmployerManager\Database\Factories;

use Modules\EmployerManager\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;


class EmployerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'user_id' => $this->faker->randomDigitNotNull,
            'ecs_number' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'company_name' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'company_email' => $this->faker->email,
            'company_address' => $this->faker->address,
            'company_rcnumber' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'cac_reg_year' => $this->faker->randomDigitNotNull,
            'contact_person' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'contact_number' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'company_localgovt' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'company_state' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'number_of_employees' => $this->faker->randomDigitNotNull,
            'status' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'registered_date' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'business_area' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'inspection_status' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'created_by' => $this->faker->randomDigitNotNull,
            'updated_by' => $this->faker->randomDigitNotNull
        ];
    }
}
