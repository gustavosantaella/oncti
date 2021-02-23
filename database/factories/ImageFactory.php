<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models as modelo;
use App\Models\Noticia;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = modelo\Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
             'url'=>$this->faker->url(),
                      'noticia_id'=>Noticia::all()->random()->id,
                      'pertenece'=>modelo\Noticia::class
        ];
    }
}
