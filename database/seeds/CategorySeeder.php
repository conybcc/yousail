<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['php', 'mysql', 'nginx', 'linux', 'redis'];
        foreach ($categories as $index => $name) {
            \DB::table('category')->insert([
                'name' => $name,
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
