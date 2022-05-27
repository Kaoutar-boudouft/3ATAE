<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string('Title');
            $table->text('Description');
            $table->timestamp('AnnDate')->nullable();
            $table->string('City');
            $table->string('status')->default('encoursdevalidation');
            $table->text('images');
            $table->foreignId('AnnonceurId')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('SousCategoryId')->constrained('souscategory')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('WhoGetTheOffer')->nullable()->constrained('users')->onDelete('set null')->onUpdate('cascade');
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('annonces');
    }
}
