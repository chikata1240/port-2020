<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'content' => 'PHPフレームワーク Laravel入門',
            'limit' => '2020/12/01',
            'rule' => '355',
            'type' => 'book',
            'user_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('plans')->insert($param);

        $param = [
            'content' => 'PHPフレームワーク Laravel実戦開発',
            'limit' => '2021/6/01',
            'rule' => '350',
            'type' => 'book',
            'user_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('plans')->insert($param);

        $param = [
            'content' => '腹筋',
            'limit' => '腹筋を割る',
            'rule' => '毎日100回',
            'type' => 'training',
            'user_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('plans')->insert($param);
    }
}
