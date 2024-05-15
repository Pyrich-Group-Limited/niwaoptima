<?php

namespace Database\Factories;

use App\Models\ServiceApplication;
use Illuminate\Database\Eloquent\Factories\Factory;


class ServiceApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServiceApplication::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'service_id' => $this->faker->word,
            'application_form_payment_status' => $this->faker->boolean,
            'date_of_inspection' => $this->faker->date('Y-m-d H:i:s'),
            'service_type_id' => $this->faker->text($this->faker->numberBetween(5, 100)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'current_step' => $this->faker->word,
            'status_summary' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'user_id' => $this->faker->word,
            'mse_are_documents_verified' => $this->faker->word,
            'mse_document_verification_comment' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'finance_is_application_fee_verified' => $this->faker->word,
            'finance_is_processing_fee_verified' => $this->faker->word,
            'finance_is_inspection_fee_verified' => $this->faker->word,
            'inspection_status' => $this->faker->word,
            'comments_on_inspection' => $this->faker->text($this->faker->numberBetween(5, 65535)),
            'inspection_report_document_path' => $this->faker->text($this->faker->numberBetween(5, 191)),
            'are_equipment_and_monitoring_fees_verified' => $this->faker->word,
            'area_officer_approval' => $this->faker->word,
            'area_officer_signature_path' => $this->faker->text($this->faker->numberBetween(5, 191)),
            'hod_marine_approval' => $this->faker->word,
            'hod_marine_signature_path' => $this->faker->text($this->faker->numberBetween(5, 191)),
            'permit_document_path' => $this->faker->text($this->faker->numberBetween(5, 191))
        ];
    }
}
