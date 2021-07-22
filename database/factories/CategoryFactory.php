<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /**
         * Le vamos a indicar a faker que nos descarge una imagen para la categoria
         *  le llamamos al campo 'image' 
         *  NOTA:la unica carpeta a la que podemos acceder desde el navegador cuando 
         * la subamos al servidor es a la  'public' con lo cual las imagenes si o si 
         * deben estar hay almacenadas el problema es que cuando subimos las imagenes 
         * ellas se guardan es en la carpeta 'storage/app'. Lo ideal es que se suban 
         * 'storage/app/public' pq en la carpeta public ahy un acceso directo a esta
         * ubicación que lo crea automaticamente JETSTREAM si se clona el proyecto es 
         * necesario crearlo y se hace de la siguiente manera   PHP ARTISAN STORAGE:LINK
         * 
         *   la ubcicaion donde se alamacenan 'public/storage/categories' el siguiente 
         * parametro es el ancho 640 el siguiente el alto 480 el siguiente es null el
         * siguiente parametro es un booleano si lo colocamos en TRUE faker va almacenar el 
         * valor completo en nuestra BD quedando asi public/storage/categories/imagen1.jpg 
         * y si colocamos FALSE sera imagen1.jpg  para este caso necesitamos que 
         * sea false y como deseamos que se guarde el nombre de la carpeta categories lo que 
         * hacemos es una concatenacion 'categories/' . luego seguido lo de 
         *  $this->faker->image('public/storage/categories', 640, 480, null, false) 
         * en la BD se guardaria 'categories/imagen1.jpg' ahora vamos al Seeder
         */
        return [
            'image' => 'categories/' . $this->faker->image('public/storage/categories', 640, 480, null, false) 
        ];
        /**
         * NOTA: faker no sabe crear carpetas con lo cual debemos crearlas en el DatabaseSedeer
         */
    }
}
