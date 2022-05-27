<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserwantofferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userwantoffer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('UserWhoWant')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('AnnonceId')->constrained('annonces')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('userwantoffer');
    }
}
