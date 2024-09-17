<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ColoresProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('color_products')->insert([
        [
            'nombre' => "Blanco",
            'color' => "#ffffff",
        ],
        [
            'nombre' => "Negro",
            'color' => "#000000",
        ],
        [
            'nombre' => "Dorado",
            'color' => "#d1d104",
        ],
        [
            'nombre' => "Plateado",
            'color' => "#aaaaaa",
        ],
        [
            'nombre' => "Azul",
            'color' => "#1100ff",
        ],
        [
            'nombre' => "Rojo",
            'color' => "#ff1100",
            
        ],
        [
            'nombre' => "Rosa",
            'color' => "#f36dd1",
            
        ],
        [
            'nombre' => "Verde",
            'color' => "#00ff37", 
            
        ],
        [
            'nombre' => "Cafe",
            'color' => "#977203",  
        ],
        [
            'nombre' => "Amarillo",
            'color' => "#fffb00", 
        ],
        [
            'nombre' => "Miel",
            'color' => "#bd8e00", 
        ],
        [
            'nombre' => "Arena",
            'color' => "#C2B280", 
        ]

    ]);

    }
}
