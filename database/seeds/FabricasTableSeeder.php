<?php

use Illuminate\Database\Seeder;

class FabricasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('fabricas')->truncate();
        DB::table('fabricas')->insert([
            'nombre' => 'MANACO S.A.',
            'telefono' => '4400001'
        ]);
        DB::table('fabricas')->insert([
            'nombre' => 'VOLVO SRL',
            'telefono' => '4400002'
        ]);
        DB::table('fabricas')->insert([
            'nombre' => 'MAFUQUI S.A.',
            'telefono' => '4400003'
        ]);
    }
}
