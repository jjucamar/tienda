<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


//Importamos a la clase BUILDER para consultar los datos de una relación
use Illuminate\Database\Eloquent\Builder;

// Modelo que vamos a traer los datos
use App\Models\Product;

class SizeSeeder extends Seeder
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
                    ->where('size', true);
            // get para que me retorne los valores
        })->get();
    
        // Creamos una variable con un array con las tallas que queremos tener
        $sizes = ['Talla S', 'Talla M', 'Talla L', 'Talla XL'];

        // recorremos los datos obtenidos mediante un ciclo
        foreach ($products as $product) {
            /**
             * Necesitamos que cada producto tengan las tallas por eso generamos 
             * un nuevo bucle
             * 
             */
            foreach ($sizes as $size) {
                /**
                 * Recuperamos el objeto product y accedemos a la relacion con sizes()
                 * que se encuentra en el modelo product luego le decimos que agrege un 
                 * registro a esta relación
                 */
                $product->sizes()->create([
                    // como nos pide el nombre lo enviamos en un array
                    'name' => $size
                ]);
            }
            
        }
    }
}
