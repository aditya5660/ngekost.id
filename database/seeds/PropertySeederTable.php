<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon as Carbon;
use App\Property;

class PropertySeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i <= 100 ; $i++) {
            $image = 'dummy-property-image-'.$faker->numberBetween($min = 1, $max = 11).'.png';
            $title = 'Kost Pak '.$faker->firstName($gender ='male').' Kota '.$faker->city();
            $slug  = str_slug($title).'-'.$i;
            $property_id = $i;
            DB::table('properties')->insert([
                'id'                    => $property_id,
                'title'                 => $title,
                'slug'                  => $slug,
                'address'               => $faker->address(),
                'location_latitude'     => $faker->latitude($min = -90, $max = 90),
                'location_longitude'    => $faker->longitude($min = -90, $max = 90),
                'provinces'             => 34,
                'regencies'             => $faker->numberBetween($min = 3401,$max =3404),
                'districts'             => '34040'.$faker->numberBetween($min =1,$max = 9).'0',
                'zipcode'               => $faker->postcode(),
                'daily_price'           => $faker->numberBetween($min = 50000, $max = 200000),
                'monthly_price'         => $faker->numberBetween($min = 400000, $max = 2000000),
                'yearly_price'          => $faker->numberBetween($min = 4000000, $max = 2000000),
                'p_room_size'           => 4,
                'l_room_size'           => 4,
                'available_room'        => $faker->numberBetween($min = 1 , $max = 20),
                'status'                => 1,
                'featured'              => 0,
                'image'                 => $image,
                'description'           => $faker->unique()->paragraph(),
                'amenities_id'          => '1//2//3//4//5//6//7//8//9//10//11//12//13',
                'user_id'               =>  2,
                'category_id'           =>  $faker->numberBetween($min = 1 , $max = 3),
                'created_at'            =>  Carbon::now(),
                'updated_at'            =>  Carbon::now(),
            ]);

            for ($n=1; $n < 5 ; $n++) {
                DB::table('property_image_galleries')->insert([
                    'property_id'           => $property_id,
                    'name'                  => $image,
                    'size'                  => 83981,
                    'created_at'            =>  Carbon::now(),
                    'updated_at'            =>  Carbon::now(),
                ]);
            }
        }

    }
}
