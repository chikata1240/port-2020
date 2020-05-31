<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'comment' => '私も同じく環境構築で挫折しました！一緒に頑張りましょう！！',
            'progress_id' => '1',
            'user_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('replies')->insert($param);

        $param = [
            'comment' => 'ありがとうございます！',
            'progress_id' => '1',
            'user_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('replies')->insert($param);

        $param = [
            'comment' => 'おめでとうございます！',
            'progress_id' => '3',
            'user_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('replies')->insert($param);
    }
}
