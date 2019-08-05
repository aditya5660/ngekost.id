<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon as Carbon;

class BlogSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_category')->insert([
            [
                'id'   => 1,
                'name' => 'Seputar Ngekost',
                'slug' =>  'seputar-ngekost',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'   => 2,
                'name' => 'Tips Ngekost',
                'slug' =>  'tips-ngekost',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'   => 3,
                'name' => 'Promo ngekost.id',
                'slug' =>  'promo-ngekost',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        $faker = Faker::create('id_ID');

    // body	view_count	status	is_approved	category_id	created_at	updated_at
        for($i = 1 ; $i <= 30 ; $i++){
            DB::table('posts')->insert([
                'user_id' => 1,
                'title' => $faker->sentence(),
                'slug'  => str_slug($faker->sentence()),
                'image' => 'blog-image-default.png',
                'body' => $faker->paragraph(),
                'status' => 1,
                'is_approved' => 1,
                'category_id' => $faker->numberBetween($min = 1, $max = 3), // 8567
                'created_at' => Carbon::now(),
                'Updated_at' => Carbon::now(),
            ]);
        }
    }
}
