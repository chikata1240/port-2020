<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ExecutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'day' => '2020/05/07',
            'progress' => '20',
            'memo' => '環境構築で一旦挫折した',
            'content_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('executions')->insert($param);

        $param = [
            'day' => '2020/05/27',
            'progress' => '10',
            'memo' => 'またも、環境構築で挫折',
            'content_id' => '2',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('executions')->insert($param);

        $param = [
            'day' => '2020/05/28',
            'progress' => '50',
            'memo' => '少し進んだ',
            'content_id' => '2',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('executions')->insert($param);

        $param = [
            'day' => '2020/05/01',
            'progress' => 'ルールを達成。',
            'memo' => '腹筋が痛い',
            'content_id' => '3',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('executions')->insert($param);

        $param = [
            'day' => '2020/05/10',
            'progress' => 'ルールより10回多めに腹筋をした',
            'memo' => 'あまり筋肉痛にならない',
            'content_id' => '3',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('executions')->insert($param);
    }
}
