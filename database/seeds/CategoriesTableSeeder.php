<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Magento',
            'url_name' => 'magento',
            'description' => 'magento',
            'parent_id' => '0',
        ]);

        DB::table('categories')->insert([
            'name' => 'Wordpress',
            'url_name' => 'wordpress',
            'description' => 'wordpress',
            'parent_id' => '0',
        ]);

        DB::table('categories')->insert([
            'name' => '案例',
            'url_name' => 'case',
            'description' => 'case',
            'parent_id' => '0',
        ]);

        DB::table('categories')->insert([
            'name' => '联系我们',
            'url_name' => 'contact-us',
            'description' => 'contact-us',
            'parent_id' => '0',
        ]);

      
    }
}
