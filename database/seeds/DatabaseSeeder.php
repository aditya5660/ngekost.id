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
                'id'            => 1,
                'role_id'       => 1,
                'name'          => 'Admin',
                'username'      => 'admin',
                'email'         => 'admin@ngekost.id',
                'image'         => 'default.png',
                'about'         => 'Bio of admin',
                'password'      => bcrypt('123qweasd'),
                'verified'      => 1,
                'created_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 2,
                'role_id'       => 2,
                'name'          => 'Owner',
                'username'      => 'owner',
                'email'         => 'owner@ngekost.id',
                'image'         => 'default.png',
                'about'         => '',
                'password'      => bcrypt('123qweasd'),
                'verified'      => 1,
                'created_at'    => date("Y-m-d H:i:s")
            ],
            [
                'id'            => 3,
                'role_id'        => 3,
                'name'          => 'User',
                'username'      => 'user',
                'email'         => 'user@ngekost.id',
                'verified'      => 1,
                'image'         => 'default.png',
                'about'         => null,
                'password'      => bcrypt('123qweasd'),
                'created_at'    => date("Y-m-d H:i:s")
            ],
        ]);
        DB::table('verify_users')->insert([
            [
                'user_id'       => 1,
                'token'         => sha1(time()),
                'created_at'    => date("Y-m-d H:i:s")
            ],
            [
                'user_id'       => 2,
                'token'         => sha1(time()),
                'created_at'    => date("Y-m-d H:i:s")
            ],
            [
                'user_id'       => 3,
                'token'         => sha1(time()),
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
        DB::table('settings')->insert([
            'name'          => 'Ngekost.id',
            'email'         => 'hello@ngekost.id',
            'phone'         => '02748567123',
            'address'           => 'Ruko Casa Grande, Jl. Ring Road Utara No.25, Jenengan, Maguwoharjo, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283',
            'footer'            => 'Cari Kost? ya di ngekost.id',
            'aboutus'           => 'Ngekost.id web application menyajikan informasi Kamar kosan, lengkap dengan fasilitas kost, harga kost, dan dekorasi kamar beserta foto desain kamar yang disesuaikan dengan kondisi sebenarnya. Setiap Rumah Kost yang ada di Kosan.id benar-benar kami datangi, kami verifikasi, kami seleksi dan kami ambil data langsung, termasuk kost yang didaftarkan oleh pemilik atau umum. Informasi ketersediaan kamar kost dan harga kost kami update max setiap 2 minggu sekali untuk memastikan info kost kami akurat dan bermanfaat untuk anak kost.',
            'facebook'          => 'https://www.facebook.com/adt12',
            'twitter'           => 'https://www.twitter.com/adt12',
            'linkedin'          => 'https://www.linkedin.com/in/adityaproject',
        ]);
        DB::table('categories')->insert([
            [
                'category_name' => 'Kost Putra',
                'slug'          => 'kost-putra'
            ],
            [
                'category_name' => 'Kost Putri',
                'slug'          => 'kost-putri'
            ],
            [
                'category_name' => 'Kost Campur',
                'slug'          => 'kost-putra'
            ],
            [
                'category_name' => 'Kontrakan',
                'slug'          => 'kontrakan'
            ],
            [
                'category_name' => 'Apartment',
                'slug'          => 'apartment'
            ]
        ]);
        DB::table('amenities')->insert([
            [
                'name'          => 'Wifi',
                'icon'          => 'fa fa-wifi'
            ],
            [
                'name'          => 'Air Conditioner / AC',
                'icon'          => 'fa fa-asterisk'
            ],
            [
                'name'          => 'TV',
                'icon'          => 'fa fa-tv'
            ],
            [
                'name'          => 'Kamar Mandi Dalam',
                'icon'          => 'fa fa-shower'
            ],
            [
                'name'          => 'Kamar Mandi Luar',
                'icon'          => 'fa fa-bath'
            ],
            [
                'name'          => 'Kasur',
                'icon'          => 'fa fa-bed'
            ],
            [
                'name'          => 'Listrik Gratis',
                'icon'          => 'fa fa-plug'
            ],
            [
                'name'          => 'Listrik Token',
                'icon'          => 'fa fa-plug'
            ],
            [
                'name'          => 'Lemari Pakaian',
                'icon'          => ''
            ],
            [
                'name'          => 'Akses Kunci 24 Jam',
                'icon'          => ''
            ],
            [
                'name'          => 'Parkir Motor',
                'icon'          => ''
            ],
            [
                'name'          => 'Parkir Mobil',
                'icon'          => ''
            ],
            [
                'name'          => 'Dapur Bersama',
                'icon'          => ''
            ]
        ]);
    }
}
