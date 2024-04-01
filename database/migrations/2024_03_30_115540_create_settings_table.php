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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('nameWebsite' , 30);
            $table->string('linkWebsite' , 128);
            $table->string('Keywords' , 50)->nullable();
            $table->string('Description' , 128)->nullable();
            $table->string('socialMidiaFacebook' , 128)->nullable();
            $table->string('socialMidiaTelegram' , 128)->nullable();
            $table->string('socialMidiaInstagram' , 128)->nullable();
            $table->string('socialMidiaYoutube' , 128)->nullable();
           // $table->tinyInteger('insertQuick')->nullable()->default('0');
            $table->string('icon' , 191)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
