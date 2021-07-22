<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

// importar clases
use App\Models\Subcategory;
use Illuminate\Support\Str;
class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // le pedinmos a faker que nos lo llene con 2 palabras
        $name = $this->faker->sentence(2);

        /**
         * Definimos una variable luego queremos que nos recupere todas las subcategoria 
         * de la tabla y luego conel metodo random escojemos una al azar
         */
        // necesitamos importar el modelo
        $subcategory = Subcategory::all()->random();
       
       /**
        * Necesitamos la categoria a la que pertenece la SubCategoria 
        * esto lo hacemos mediante la relacion que hemos definido en el
        * modelo lo guardamos en una variable category
        */
        $category = $subcategory->category;

        /**
         * Recuperamos todas las marcas asociadas a esa categoria mediante la relación que 
         * tenemos en el modelo Category muchos a muchos BRANDS y luego mediante el metodo 
         * random seleccionamos una al azar.
         */
        $brand = $category->brands->random();

        /**
         * Para guardar la cantidad depende de donde se encuentre pq aveces la guardaremos en
         *  la tabla PRODUCTS o en la tabla COLOR_PRODUCT y otras veces en la tabla COLOR_SIZE
         *  Esto depende de los valores que se hallan colocado en la tabla SUBCATEGORIES en los 
         * campos color y size: si hemos colocado el valor color como TRUE y el size como FALSE
         * debemos alamcenarlo en la tabla COLOR_PRODUCT ya que es un producto que solo necesita
         * especificar su color, si los dos campos estan en TRUE el valor de la cantidad iria en 
         * COLOR_SIZE ya que este producto necesita de un color y una talla. Si el color esta en 
         * FALSE se almacena en la tabla PRODCUTS
         * 
         * Preguntamos si el valor de la propiedad color de esta subcaegoria es true significa que 
         * el valor de la cantidad no se guardar en la tabla PRODUCTS en cuyo caso guardaremos en una
         * variable el valor de NULL en variable llamada quanty y si no es que guarde el valor de 15
         */
        if($subcategory->color){
            $quantity = null;
        }else{
            $quantity = 15;
        }

        /**
         * Le indicamos a faker que nos rellene los campos con los datos.
         */
        return [
            // le asignamos al campo name la variable que hemos generado anteriormente
            'name' => $name,
            // utilizamos la clase Str para realizar el slug automaticamente
            'slug' => Str::slug($name),
            // le pedimos a FAKER que nos genere un text de relleno
            'description' => $this->faker->text(),
            /**
             * existen 3 valores de precios 19,99 49.99 y 99,99
             * le decimos a faker que coja uno dentro de estos tres valores 
             * lo generamos mediante un metodo randomelemnt y enun array le pasamos los 
             * valores a escojer.
             */
            'price' => $this->faker->randomElement([19.99, 49.99, 99.99]),
            
            'subcategory_id' => $subcategory->id,

            /** como lla hemos obtenido toda la colección con el procedimiento anterior
             * recuperamos el id de la marca que es el que guardaremos en la BD
             */

            'brand_id' => $brand->id,

            'quantity'=> $quantity,
            // todos los productos estaran publicados por eso el estado es 2
            'status' => 2
        ];
    }
}
