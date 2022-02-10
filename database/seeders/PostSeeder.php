<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            ["titulo" => 'primer post', "extracto" => 'hehe', "contenido" => 'alto contenido', "caducable"	=> false, "comentable"	=> true, "acceso"	=> 'publico', "user_id"	=> 1],
            ["titulo" => 'primer post', "extracto" => 'huhu', "contenido" => 'bajo contenido', "caducable"	=> false, "comentable"	=> true, "acceso"	=> 'publico', "user_id"	=> 2]
        ];
        DB::table('posts')->insert($posts);
    }
}
