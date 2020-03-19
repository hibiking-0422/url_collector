<?php

use Illuminate\Database\Seeder;

class UrlTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => 1,
            'url' => 'test',
            'title' => 'test',
            'comment' => 'test'
        ];

        DB::table('urls')->insert($param);

        $param = [
            'user_id' => 2,
            'url' => 'test',
            'title' => 'test',
            'comment' => 'test'
        ];

        DB::table('urls')->insert($param);

        $param = [
            'user_id' => 3,
            'url' => 'test',
            'title' => 'test',
            'comment' => 'test'
        ];

        DB::table('urls')->insert($param);
    }
}
