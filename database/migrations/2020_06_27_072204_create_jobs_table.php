<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
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

            $table->unsignedInteger('job_types');
            $table->foreign('job_types')->references('id')->on('job_types');

            $table->string('job_title')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('date_posted')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('date_expire')->nullable()->default(Carbon::now()->addDay(10));
            $table->string('job_tag')->nullable();
            $table->decimal('salary')->nullable();
            $table->string('url')->nullable();
            $table->string('description')->nullable();
            $table->string('requirements')->nullable();
            $table->string('benefits')->nullable();

            $table->string('location')->nullable();
            $table->integer('active')->default(0);
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
