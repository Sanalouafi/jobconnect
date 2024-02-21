<?php

namespace Database\Factories;

use \App\Models\Company;
use App\Models\Offre;
use Illuminate\Database\Eloquent\Factories\Factory;

class OffreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Offre::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->paragraph,
            'contract' => $this->faker->randomElement(['CDI', 'CDD', 'Internship']),
            'deadline' => $this->faker->date(),
            'salary' => $this->faker->randomFloat(2, 1000, 10000),
            'localisation' => $this->faker->address,
            'company_id' => function () {
                return Company::factory()->create()->id;
            },
        ];
    }
}
