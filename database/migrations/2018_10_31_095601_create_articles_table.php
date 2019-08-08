<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('url_name')->nullable();

            $table->string('img')->nullable();
            $table->text('content')->nullable();
            $table->integer('category_id')->default(0);
            $table->integer('admin_id');


            $table->integer('view_count')->default(0);
            $table->integer('up_vote')->default(0);
            $table->integer('down_vote')->default(0);

            $table->integer('comments_count')->default(0);
            
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
        Schema::dropIfExists('articles');
    }
}
