<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*$param = [
            'user_id' => 1,
            'word' => 'domani',
            'meaning' => '明日',
        ];
        DB::table('words')->insert($param);
        */
        $param = [
            'user_id'=> 1,
            'word' => 'biscotti',
            'meaning' => 'ビスコッティ',
        ];
        DB::table('words')->insert($param);
        $param = [
            'user_id' => 1,
            'word' => 'arancia',
            'meaning' => 'オレンジ',
        ];
        DB::table('words')->insert($param);
    }
}
