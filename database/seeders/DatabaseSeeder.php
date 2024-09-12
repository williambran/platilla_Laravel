<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
/*
INSERT INTO stocks(id, name) VALUE (1,'mercado local cokies');
INSERT INTO inventories(id, stock_id,count) VALUE (1,1,3);
INSERT INTO models(id, codeID,name,inventorie_id) VALUE (1,'010124','D lucy sandalia',1);
*/
