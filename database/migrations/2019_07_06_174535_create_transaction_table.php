<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedInteger('property_id')->nullable();
            $table->foreign('property_id')
                ->on('properties')
                ->references('id');

            $table->unsignedInteger('owner_id')->nullable();
            $table->string('booking_range');
            $table->string('start_booking_date');

            $table->string('payment_slip')->nullable();
            $table->decimal('amount', 20, 2)->default(0);
            $table->string('note')->nullable();
            $table->string('status')->default('pending');
            $table->string('snap_token')->nullable();

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
        Schema::dropIfExists('transaction');
    }
}
