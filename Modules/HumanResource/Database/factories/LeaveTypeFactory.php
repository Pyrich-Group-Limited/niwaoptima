<?php
namespace Modules\HumanResource\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\HumanResource\Models\LeaveType;
class LeaveTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LeaveType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    public function definition()
    {
        return [
            
            'name'=>$this->faker->word(),
            'duration'=>$this->faker->randomNumber(2),
        ];
    }
}

