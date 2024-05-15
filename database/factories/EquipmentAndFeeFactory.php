<?php

namespace Modules\DocumentManager\Database\Factories;

use Modules\DocumentManager\Models\EquipmentAndFee;
use Illuminate\Database\Eloquent\Factories\Factory;


class EquipmentAndFeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EquipmentAndFee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'service_id' => $this->faker->randomDigitNotNull,
            'name' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'price' => $this->faker->randomDigitNotNull,
            'metric' => $this->faker->randomDigitNotNull,
            'sub_service_id' => $this->faker->randomDigitNotNull,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
