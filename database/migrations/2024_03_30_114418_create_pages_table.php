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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name' , 50)->nullable();
            $table->string('href' , 128)->nullable();
            $table->longText('content' , 256)->nullable();
            $table->string('title' , 255)->nullable();
            $table->string('keyword' , 255)->nullable();
            $table->string('photo' , 255)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_pages');
    }
};
