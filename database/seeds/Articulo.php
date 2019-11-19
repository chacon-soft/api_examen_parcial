<?php

use Illuminate\Database\Seeder;

class Articulo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articulos')->insert([
            'descripcion' => 'Zapatos de cuero, marca reebock.'
        ]);
    }
}
