<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ResultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'file_name' => '',
            'user_id' => '1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('results')->insert($param);
    }
}
