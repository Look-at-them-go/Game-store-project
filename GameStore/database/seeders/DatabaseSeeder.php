<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'=> 'admin',
        ]);

        DB::table('roles')->insert([
            'name'=> 'manager',
        ]);

        DB::table('roles')->insert([
            'name'=> 'user',
        ]);

        DB::table('users')->insert([
            'name'=> 'admin',
            'email' => 'admin@admin.com',
            'password'=> Hash::make('root'),
            'role_id' => '1'
        ]);

        DB::table('users')->insert([
            'name'=> 'manager',
            'email' => 'manager@manager.com',
            'password'=> Hash::make('root'),
            'role_id' => '2'
        ]);

        DB::table('users')->insert([
            'name'=> 'user1',
            'email' => 'user1@user.com',
            'password'=> Hash::make('1'),
            'role_id' => '3'
        ]);

        DB::table('users')->insert([
            'name'=> 'user2',
            'email' => 'user2@user.com',
            'password'=> Hash::make('12'),
            'role_id' => '3'
        ]);

        DB::table('users')->insert([
            'name'=> 'user3',
            'email' => 'user3@user.com',
            'password'=> Hash::make('123'),
            'role_id' => '3'
        ]);

        DB::table('genres')->insert([
            'name'=> 'FPS',
        ]);
        

        DB::table('games')->insert([
            'name'=> 'Doom',
            'publisher'=> 'ID Software',
            'price' => '30',
            'description' => 'SAMPLE TEXT',
            'picture' => 'doom.jpg',
            'genre_id' => '1',
        ]);

        DB::table('games')->insert([
            'name'=> 'Doom 2',
            'publisher'=> 'ID Software',
            'price' => '30',
            'description' => 'SAMPLE TEXT',
            'picture' => 'doom.jpg',
            'genre_id' => '1',
        ]);

        DB::table('games')->insert([
            'name'=> 'Doom 3',
            'publisher'=> 'ID Software',
            'price' => '30',
            'description' => 'SAMPLE TEXT',
            'picture' => 'doom.jpg',
            'genre_id' => '1',
        ]);

        DB::table('games')->insert([
            'name'=> 'Doom 4',
            'publisher'=> 'ID Software',
            'price' => '30',
            'description' => 'SAMPLE TEXT',
            'picture' => 'doom.jpg',
            'genre_id' => '1',
        ]);

        DB::table('games')->insert([
            'name'=> 'Doom 5',
            'publisher'=> 'ID Software',
            'price' => '30',
            'description' => 'SAMPLE TEXT',
            'picture' => 'doom.jpg',
            'genre_id' => '1',
        ]);
    }


}