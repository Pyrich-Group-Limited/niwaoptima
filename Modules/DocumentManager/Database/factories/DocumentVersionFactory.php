<?php

namespace Modules\DocumentManager\Database\Factories;

use Modules\DocumentManager\Models\DocumentVersion;
use Illuminate\Database\Eloquent\Factories\Factory;


class DocumentVersionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DocumentVersion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'version_number' => $this->faker->numberBetween(0, 999),
            'document_id' => $this->faker->numberBetween(0, 999),
            'document_url' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'created_by' => $this->faker->numberBetween(0, 999),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
