<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = ['FOTOGRAFIA', 'MOTION GRAPHIC', 'DESIGN GRÁFICO', 'WEB DESIGN', 'ANIMAÇÂO 2D'];

        foreach($categories as $category)
        {
            DB::table('categories')->insert([
                'name' => $category
            ]);
        }
    }
}
