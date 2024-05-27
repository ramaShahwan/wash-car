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
        Schema::create('home_orders', function (Blueprint $table) {
            $table->id();
            $table->string('typeOfHome')->nullable();
            $table->string('numOfBuild')->nullable();
            $table->string('numOfFloor')->nullable();
            $table->integer('numOfEmp')->nullable();
            $table->integer('numOfHours')->nullable();
            $table->boolean('cleanMaterial')->nullable();

            $table->string('totalPrice')->nullable();
            $table->date('orderDate')->nullable();
            $table->string('orderTime')->nullable();

            $table->string('note')->nullable();
            $table->string('status')->default('معلق')->nullable();

            $table->timestamps();
            
              //locations_table
              $table->foreignId('location_id')->nullable();
              //users_table
             $table->foreignId('user_id')->nullable();
             //payWays_table
              $table->foreignId('payWay_id')->nullable();
              //Employees_table
             $table->foreignId('employee_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_orders');
    }
};
