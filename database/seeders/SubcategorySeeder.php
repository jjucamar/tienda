<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Importamos el modelo
use App\Models\Subcategory;

//importo a la clase Str parra el manejo del slug
use Illuminate\Support\Str;
class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Creamos una variable y le especificamos un array que tendra otro array con los 
         * campos necesarios category_id,name,slug,color
         * 
         */

        $subcategories = [
            /* Celulares y tablets */
            [
                'category_id' => 1,
                'name' => 'Celulares y smartphones',
                'slug' => Str::slug('Celulares y smartphones'),
                'color' => true
            ],

            [
                'category_id' => 1,
                'name' => 'Accesorios para celulares',
                'slug' => Str::slug('Accesorios para celulares'),
            ],

            [
                'category_id' => 1,
                'name' => 'Smartwatches',
                'slug' => Str::slug('Smartwatches'),
            ],

            /* TV, audio y video */

            [
                'category_id' => 2,
                'name' => 'TV y audio',
                'slug' => Str::slug('TV y audio'),
            ],
            [
                'category_id' => 2,
                'name' => 'Audios',
                'slug' => Str::slug('Audios'),
            ],

            [
                'category_id' => 2,
                'name' => 'Audio para autos',
                'slug' => Str::slug('Audio para autos'),
            ],

            /* Consola y videojuegos */
            [
                'category_id' => 3,
                'name' => 'Xbox',
                'slug' => Str::slug('xbos'),
            ],

            [
                'category_id' => 3,
                'name' => 'Play Station',
                'slug' => Str::slug('Play Station'),
            ],

            [
                'category_id' => 3,
                'name' => 'Videojuegos para PC',
                'slug' => Str::slug('Videojuegos para PC'),
            ],

            [
                'category_id' => 3,
                'name' => 'Nintendo',
                'slug' => Str::slug('Nintendo'),
            ],

            /* Computación */

            [
                'category_id' => 4,
                'name' => 'Portátiles',
                'slug' => Str::slug('Portátiles'),
            ],

            [
                'category_id' => 4,
                'name' => 'PC escritorio',
                'slug' => Str::slug('PC escritorio'),
            ],

            [
                'category_id' => 4,
                'name' => 'Almacenamiento',
                'slug' => Str::slug('Almacenamiento'),
            ],

            [
                'category_id' => 4,
                'name' => 'Accesorios computadoras',
                'slug' => Str::slug('Accesorios computadoras'),
            ],

            /* Moda */
            [
                'category_id' => 5,
                'name' => 'Mujeres',
                'slug' => Str::slug('Mujeres'),
                'color' => true,
                'size' => true
            ],

            [
                'category_id' => 5,
                'name' => 'Hombres',
                'slug' => Str::slug('Hombres'),
                'color' => true,
                'size' => true
            ],

            [
                'category_id' => 5,
                'name' => 'Lentes',
                'slug' => Str::slug('Lentes'),
            ],

            [
                'category_id' => 5,
                'name' => 'Relojes',
                'slug' => Str::slug('Relojes'),
            ],
        ];

        /**
         *  Generamos un ciclo que me recorra la variable anterior
         * y podamos crear los datos
         */


        foreach ($subcategories as $subcategory) {

        /**
             * Llamamos a el modelo SubCategory le pasamos el metodo factory que se cree un registro
             *  (la imagen) luego le pasamos el metodo create y le pasamos los datos del array.
             * 
             * NOTA:  nos hace falta un campo el de las imagenes esto lo 
             * realizamos utilizando el facatory con lo cual debemos hacerlo antes de migrar
             * 
             *  */ 

            Subcategory::factory(1)->create($subcategory);

        }
    }
}
