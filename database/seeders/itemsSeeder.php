<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //hay que importarse esto<-------------------------------------

class itemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            [
                'nombre' => 'gana el real madrid la champions',
                'autor' => 'Tomás Roncero',
                'contenido'=>'el real madrid se impone ante el fc barcelona para gana la champions en un partido donde los blancos dominaron todo el encuentro',
                'fecha' => '2025-02-05',
                'estado' => 'p',
                'secciones'=>'p',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'gana el real Rayo Vallecano la champions',
                'autor' => 'Alvaro Benito',
                'contenido'=>'el Rayo Vallecano se impone ante el fc barcelona para gana la champions en un partido donde los blancos dominaron todo el encuentro',
                'fecha' => '2025-02-06',
                'estado' => 'p',
                'secciones'=>'p',
                'created_at' => now(),
                'updated_at' => now(),
            ]
            ]);
    }
}
