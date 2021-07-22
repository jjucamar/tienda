<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
        * Llamamos al modelo User y le pasamos el metodo CREATE para poder agregar un 
        * nuevo registro en nuestra BD con unos datos especificos
        */
        User::create([
            'name' => 'Juan Camilo Martinez Aranzales',
            'email' => 'jc@jc.com',
            'password' => bcrypt('123')
        ]);
    }
}
