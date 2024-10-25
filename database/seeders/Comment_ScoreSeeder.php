<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class Comment_ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comment_scores')->insert([
            'comment_id'=>"1",
            'comment_user_id'=>"1",
            'reviw_user_id'=>"2",
            'score'=>"1",
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
