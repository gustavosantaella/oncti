<?php

namespace Database\Factories;


use App\Models as modelo;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoticiaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model =modelo\Noticia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       

        
        return[

'titulo'=>$this->faker->sentence(),
                       'extracto'=>$this->faker->sentence(),
                       'cuerpo'=>$this->faker->text(),
                       'fecha'=>$this->faker->date(),
                       'state'=>true,
                


         

        ];

    }
}
