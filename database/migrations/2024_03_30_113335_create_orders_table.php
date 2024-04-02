<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('typeOfCar')->nullable();
            $table->string('sizeOfCar')->nullable();
            $table->string('numOfCar')->nullable();
            $table->string('totalPrice')->nullable();
            $table->dateTime('orderDate')->nullable();
            $table->dateTime('orderTime')->nullable();
            $table->timestamps();
            
              //locations_table
              $table->foreignId('location_id')->nullable();
              //users_table
             $table->foreignId('user_id')->nullable();
             //payWays_table
              $table->foreignId('payWay_id')->nullable();
        
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
