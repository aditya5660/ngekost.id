<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->longtext('address');
            $table->string('location_latitude')->nullable();
            $table->string('location_longitude')->nullable();
            $table->string('provinces');
            $table->string('regencies');
            $table->string('districts');
            $table->integer('zipcode');
            $table->string('daily_price');
            $table->string('monthly_price');
            $table->string('yearly_price');
            $table->string('p_room_size');
            $table->string('l_room_size');
            $table->string('available_room');
            $table->integer('status');
            $table->boolean('featured')->default(false);
            $table->string('image')->nullable();
            $table->text('description');
            $table->longtext('amenities_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedInteger('category_id')->nullable();
            $table->foreign('category_id')
                ->on('categories')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
