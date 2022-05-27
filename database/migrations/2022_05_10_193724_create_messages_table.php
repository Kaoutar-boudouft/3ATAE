<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('IdConversation')->constrained('conversations')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('Sender')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->text('content')->nullable();
            $table->timestamp('SendAt')->nullable();
            $table->timestamp('Read_At')->nullable();
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
        Schema::dropIfExists('messages');
    }
}
