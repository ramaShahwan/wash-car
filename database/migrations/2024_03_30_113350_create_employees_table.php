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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('firstName')->nullable();
            $table->string('lastName')->nullable();
            $table->date('birthDate')->nullable();
            $table->string('Gender')->default('ذكر')->nullable();
            $table->string('phone')->nullable();
            $table->string('aboutYou')->nullable();
            $table->string('image')->nullable();
            $table->string('area')->nullable();
            $table->string('typeOfWork')->nullable();
            $table->string('status')->default('Pending')->nullable();
            $table->string('role')->default('employee')->nullable();

            $table->string('note')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
