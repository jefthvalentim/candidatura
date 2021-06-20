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
        $categories = ['Fotografia', 'Motion Graphic', 'Design Gráfico', 'Web Design', '2D Animation'];

        foreach($categories as $category)
        {
            DB::table('categories')->insert([
                'name' => $category
            ]);
        }
    }
}
