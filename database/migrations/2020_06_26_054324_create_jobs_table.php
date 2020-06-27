<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('jobs', function (Blueprint $table) {
        $table->increments('id')->length(11);
        $table->unsignedInteger('majors');
        $table->foreign('majors')->references('id')->on('majors');
        $table->unsignedInteger('companies');
        $table->foreign('companies')->references('id')->on('companies');
//        $table->foreignId('majors')->constrained('majors'); //
//        $table->foreignId('companies')->constrained('companies');
        $table->string('name')->nullable();
        $table->date('date_posted')->nullable();
        $table->date('date_expire')->nullable();
        $table->string('key_words')->nullable();
        $table->decimal('salary')->nullable();
        // $table->string('url')->nullable();
        $table->string('description')->nullable();
        $table->string('location')->nullable();
        $table->string('job_type')->nullable();
        $table->integer('active');

        $table->timestamps();
    });
//        Schema::table('jobposts', function($table)
//        {
//            $table->foreign('majors')->references('id')->on('majors');
//            $table->foreign('companies')->references('id')->on('companies');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobposts');
    }
}
