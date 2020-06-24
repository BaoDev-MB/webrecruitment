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
            $table->bigIncrements('id');
            $table->string('fullname')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->text('avt')->nullable();
            $table->string('phone')->nullable();
            $table->enum('gender',['Nam','Nu'])->nullable();
            $table->integer('studentcode')->nullable();
            $table->date('dateofbirth')->nullable();
            $table->integer('group')->nullable();
            $table->text('radom_key')->nullable();
            $table->dateTime('key_time')->nullable();
            $table->integer('active');
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
