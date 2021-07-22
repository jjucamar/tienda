<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Brand;
use App\Models\Category;

// esta clase convierte cadenas en Slug
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creamos un variable y la convertimos en un array dentro de otro array 
        //  con los campos de la categoria [name, slug, icono] para guardar las categorias
        $categories = [
            [
                'name' => 'Celulares y tablets',
                // el metodo str llamamos a la clase slug y lo que queremos transformar
                'slug' => Str::slug('Celulares y tablets'),
                // son iconos de la libreria fontawesome  de la web FONTAWESOME.COM  
                // https://fontawesome.com/v5.15/icons?d=gallery&p=2&m=free
                'icon' => '<i class="fas fa-mobile-alt"></i>'
            ],
            [
                'name' => 'TV, audio y video',
                'slug' => Str::slug('TV, audio y video'),
                'icon' => '<i class="fas fa-tv"></i>'
            ],

            [
                'name' => 'Consola y videojuegos',
                'slug' => Str::slug('Consola y videojuegos'),
                'icon' => '<i class="fas fa-gamepad"></i>'
            ],

            [
                'name' => 'Computación',
                'slug' => Str::slug('Computación'),
                'icon' => '<i class="fas fa-laptop"></i>'
            ],

            [
                'name' => 'Moda',
                'slug' => Str::slug('Moda'),
                'icon' => '<i class="fas fa-tshirt"></i>'
            ],
        ];

        /**
         * Crear registros apartir del array que hemos creado anteriormente
         * Lo hacemos mediante el recorrido del arrary
         */
        foreach ($categories as $category) {
            /**
             * Llamamos a el modelo Category le pasamos el metodo factory que se cree un registro
             *  (la imagen) luego le pasamos el metodo create y le pasamos los datos del array.
             * 
             * NOTA:  nos hace falta un campo el de las imagenes esto lo 
             * realizamos utilizando el facatory con lo cual debemos hacerlo antes de migrar
             * 
             * le pasamos el metodo first() para que me devuelva el primer registro de la colección
             * en este caso el unico que lo necesitamos para luego conocer el id de la categoria
             *  */ 
            $category = Category::factory(1)->create($category)->first();

            /**
             * Generamos las marcas despues de crear las categorias creamos las marcas
             * para este caso le pedimos que nos cree 4 marcas y nos la guarde enuna variable
             * en este caso brands. Necesitamos importar el modelo Brand.
             * use App\Models\Brand;
             */
            $brands = Brand::factory(4)->create();

            /**
             * Generamos un ciclo para recorrer la variable anterior i recuperar su id luego
             * recuperamos la relacion con categorias que tenemos en el modelo brand luego le pasamos
             * el metodo attach (Que nos permite guardar datos en otra tabla en este caso en la intermedia)
             * le pasamos el id de la categoria con la queremos relacionar con esto 
             * logramos que cada categoria tenga 4 marcas distintas
             */
            foreach ($brands as $brand) {
                $brand->categories()->attach($category->id);
            }
        }

    }
}
