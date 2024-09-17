<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class InventoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stocks')->insert([
            [
                'name' => "Bodega Vestidos"
            ]
            ]);

        DB::table('inventories')->insert([
            [
                'stock_id' => "1"
            ]
            ]);
    }
}
