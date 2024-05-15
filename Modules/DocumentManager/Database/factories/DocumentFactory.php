<?php

namespace Modules\DocumentManager\Database\Factories;

use Modules\DocumentManager\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;


class DocumentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Document::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'title' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'description' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'document_url' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'folder_id' => $this->faker->numberBetween(0, 999),
            'created_by' => $this->faker->numberBetween(0, 999),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
