<?php

namespace Database\Factories;

use \App\Models\Offre;
use App\Models\Favorise;
use Illuminate\Database\Eloquent\Factories\Factory;

class FavoriseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Favorise::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'offre_id' => Offre::factory()->create()->id,
        ];
    }
}
