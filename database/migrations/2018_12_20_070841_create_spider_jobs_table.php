<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpiderJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spider_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('url')->nullable();
            $table->text('content');
            $table->string('img')->nullable();
            $table->integer('is_post')->default(0);
            $table->integer('is_collect')->default(0);
            $table->integer('target_id');

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
        Schema::dropIfExists('spider_jobs');
    }
}
