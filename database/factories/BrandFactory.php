<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // le pedimos a faker que complete el campo 'name' con una palabra
            'name' => $this->faker->word()
            // luego le pedimos que se creen estas marcas dentro del CategorySeeder
        ];
    }
}
