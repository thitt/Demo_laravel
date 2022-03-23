<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'user_id' => 1,
                'name' => 'Name 1',
                'title' => 'Title 1',
                'content' => 'Content 1',
                'active' => 1,
                'category_id' => 1,
            ],
            [
                'user_id' => 2,
                'name' => 'Name 2',
                'title' => 'Title 2',
                'content' => 'Content 2',
                'active' => 1,
                'category_id' => 1,
            ]
        ]);
    }
}
