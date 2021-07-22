<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// importar modelos
use App\Models\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Definimos una variable con un arrary de colores
        $colors = ['white', 'blue', 'red', 'black'];

        /**
         * Recorremos la variable mediante un ciclo 
         */
        foreach ($colors as $color) {
            // llamamos el modelo COLOR y le pedimos que nos cree el color
            Color::create([
                // le asignamos el valor al campor name con el valor de la variable
                'name' => $color
            ]);
        }
  
    }

}
