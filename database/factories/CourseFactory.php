<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'      => $this->faker->name,
            'image'     => $this->faker->imageUrl,
            'admin_id'  => $this->faker->numberBetween($min = 1, $max = 1000),
            'role_id'   => $this->faker->numberBetween($min = 1, $max = 1000)
        ];
    }
}
