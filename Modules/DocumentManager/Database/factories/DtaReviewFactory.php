<?php

namespace Modules\DTARequests\Database\Factories;

use Modules\DTARequests\Models\DtaReview;
use Illuminate\Database\Eloquent\Factories\Factory;


class DtaReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DtaReview::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'dta_reviewid' => $this->faker->word,
            'officer_id' => $this->faker->randomDigitNotNull,
            'comments' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'review_status' => $this->faker->randomDigitNotNull,
            'status' => $this->faker->randomDigitNotNull,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
