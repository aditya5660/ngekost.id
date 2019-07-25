<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            [
                'role_id'       => 1,
                'name'          => 'Admin',
                'username'      => 'admin',
                'email'         => 'admin@ngekost.id',
                'image'         => 'default.png',
                'about'         => 'Bio of admin',
                'password'      => bcrypt('123qweasd'),
                'created_at'    => date("Y-m-d H:i:s")
            ],
            [
                'role_id'       => 2,
                'name'          => 'Owner',
                'username'      => 'owner',
                'email'         => 'owner@ngekost.id',
                'image'         => 'default.png',
                'about'         => '',
                'password'      => bcrypt('123qweasd'),
                'created_at'    => date("Y-m-d H:i:s")
            ],
            [
                'role_id'       => 3,
                'name'          => 'User',
                'username'      => 'user',
                'email'         => 'user@ngekost.id',
                'image'         => 'default.png',
                'about'         => null,
                'password'      => bcrypt('123qweasd'),
                'created_at'    => date("Y-m-d H:i:s")
            ],
        ]);


        DB::table('roles')->    insert([
            [
                'name'          => 'Admin',
                'slug'          => 'admin',
                'created_at'    => date("Y-m-d H:i:s")
            ],
            [
                'name'          => 'Owner',
                'slug'          => 'owner',
                'created_at'    => date("Y-m-d H:i:s")
            ],
            [
                'name'          => 'Users',
                'slug'          => 'users',
                'created_at'    => date("Y-m-d H:i:s")
            ]
        ]);

    }
}
