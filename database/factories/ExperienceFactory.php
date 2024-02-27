<?php

namespace Database\Factories;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Experience::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->jobTitle,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'company_name' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'task' => $this->faker->sentence,
            'user_id' => 2,
        ];
    }
}
