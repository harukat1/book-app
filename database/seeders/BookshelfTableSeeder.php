<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookshelfTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // usersテーブルから1つのデータを取得
        $user = DB::table('users')->first();

        DB::table('books')->insert([
            'user_id' => $user->id,
            'title' => 'JavaScript「超」入門',
            'category' => 'JavaScript',
            'book_status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('books')->insert([
            'user_id' => $user->id,
            'title' => 'いきなりはじめるPHP ワクワク・ドキドキの入門教室',
            'category' => 'PHP',
            'book_status' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('books')->insert([
            'user_id' => $user->id,
            'title' => 'よくわかるPHPの教科書',
            'category' => 'PHP',
            'book_status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('books')->insert([
            'user_id' => $user->id,
            'title' => 'PHPフレームワークLaravel入門',
            'category' => 'Laravel',
            'book_status' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

    }
}
