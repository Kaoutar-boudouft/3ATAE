<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('UserName')->unique();
            $table->string('email')->unique();
            $table->integer('phoneNumber')->unique();
            $table->date('birthdate');
            $table->string('City');
            $table->string('password',1910);
            $table->string('photo')->default('utilisateur.png');
            $table->string('confmssg')->default('');
            $table->string('confnumber')->default('');
            $table->string('validationlevel')->default('0');
            $table->boolean('admin')->default(false);
            $table->integer('Points')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
