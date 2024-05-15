<?php

namespace Modules\EmployerManager\Database\Factories;

use Modules\EmployerManager\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

use Modules\EmployerManager\Models\Employer;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $employer = Employer::first();
        if (!$employer) {
            $employer = Employer::factory()->create();
        }

        return [
            'employer_id' => $employer->id,
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'date_of_birth' => $this->faker->text(500),
            'gender' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'marital_status' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'email' => $this->faker->email,
            'employment_date' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'address' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'local_govt_area' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'state_of_origin' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'phone_number' => $this->faker->numerify('0##########'),
            'means_of_identification' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'identity_number' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'identity_issue_date' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'identity_expiry_date' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'next_of_kin' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'next_of_kin_phone' => $this->faker->numerify('0##########'),
            'monthly_renumeration' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'status' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
