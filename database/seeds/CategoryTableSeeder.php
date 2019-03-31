<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'category_id' => 1,
            'name' => 'Poezie',
            'staff_id' => 1
        ]);

        DB::table('category')->insert([
            'category_id' => 2,
            'name' => 'Roman',
            'staff_id' => 2
        ]);

        DB::table('category')->insert([
            'category_id' => 3,
            'name' => 'Balada',
            'staff_id' => 3
        ]);
    }
}
