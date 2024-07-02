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
        Schema::create('recharge', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();

            $table->integer('amount')->nullable();
            $table->string('admin_who_added')->nullable();
            
            //users_table
            $table->foreignId('user_id')->nullable();

            $table->integer('car_home_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recharge');
    }
};
