<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Importamos a la clase BUILDER para consultar los datos de una relación
use Illuminate\Database\Eloquent\Builder;

// Modelo que vamos a traer los datos
use App\Models\Size;

class ColorSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         /**
         *  Generamos una variable y guradamos los datos de las tallas
         */
        $sizes = Size::all();

        // recorremos los datos obtenidos
        foreach ($sizes as $size) {

             /**
              * Para guardar los valores en la tabla intermedia size_color
             * accedemos al metodo size luego a la relación colors() y atravez del
             * metodo attach. Al metodo attach tenemos que pasarle dos valores el id del color que 
             * queremos relacionarlo tamnien el id del tamaño
             *  */ 
            $size->colors()
                ->attach([  
                        // cada tamaño tendra los cuatro colores creados anteriormente id de color 1,2,3,4
                            1 => [
                                 // Generamos un array para campos extras que le vamos a pasar en este caso la cantidad
                                'quantity' => 21],
                            2 => ['quantity' => 22],
                            3 => ['quantity' => 23],
                            4 => ['quantity' => 24]
                        ]);
        }
    }
}
