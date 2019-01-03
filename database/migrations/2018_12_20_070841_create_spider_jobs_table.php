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
            $table->string('title')->index()->comment('标题');
            $table->string('url')->index()->comment('链接');
            $table->text('content')->comment('内容');
            $table->string('img')->comment('缩略图');
            $table->integer('is_post')->default(0)->comment('是否发表');
            $table->integer('is_collect')->default(0)->comment('是否采集');
            $table->integer('target_id')->comment('目标id');

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
