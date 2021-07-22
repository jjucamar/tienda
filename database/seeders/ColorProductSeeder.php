<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Importamos a la clase BUILDER para consultar los datos de una relación
use Illuminate\Database\Eloquent\Builder;

// Modelo que vamos a traer los datos
use App\Models\Product;

class ColorProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Esta es una consulta especial porque no vamos hacer una consulta a los campos
         * del modelo que queremos trabajar que en este caso es PRODUCT si no a una relación
         * en este caso a la relación con SUBCATEGORIES la relación esta en el modelo Product y se 
         * llama subcategory.
         * 
         * LLamamos al modelo product y utilizamos el metodo whereHas que es el que nos 
         * permite traer los datos de las relaciones, El priner parametro es el nombre de la 
         * realción a la que queremos consultar SUBCATEGORY y el Segundo parametro le pasamos 
         * una funcion debe recibir una instancia de la clase BUILDER y una variable
         * query que es donde realizamos las preguntas
         * alamacenamos la colección obtenida en una variable $product
         */
        $products = Product::whereHas('subcategory', function(Builder $query){
            // hacemos las preguntas que deseamos
            $query->where('color', true)
                    ->where('size', false);
                    // get para que me retorne los valores
        })->get();


        // recorremos los datos obtenidos
        foreach ($products as $product) {
            /**
             * accedemos al metodo product luego a la relación colors() y atravez del
             * metodo attach. Al metodo attach tenemos que pasarle dos valores el id del color que 
             * queremos relacionarlo tamnien el id del product
             *  */ 
            // le guardamos los datos a la tabla intermedia Color_product
            $product->colors()->attach([
                
                // cada producto tendra los cuatro colores creados anteriormente id de color 1,2,3,4
                1 => [
                    // Generamos un array para campos extras que le vamos a pasar en este caso la cantidad
                    'quantity' => 11
                ], 
                2 => [
                    'quantity' => 12
                ], 
                3 => [
                    'quantity' => 13
                ], 
                4 => [
                    'quantity' => 14
                ]
            ]);
        }
    }
}
