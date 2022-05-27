<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('TheOwnerOfOffer')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('TheWinner')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('AnnId')->constrained('annonces')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('LastSeen')->nullable();
            $table->string('status')->default('encours');
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
        Schema::dropIfExists('conversations');
    }
}
