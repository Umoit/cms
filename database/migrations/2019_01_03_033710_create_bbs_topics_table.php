<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBbsTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bbs_topics', function (Blueprint $table) {
            $table->increments('id');
            // $table->string('slug')->comment('短链接');
            $table->string('title')->comment('标题');
            $table->string('type')->comment('类型');
            $table->string('img')->comment('预览图')->nullable();
            $table->text('content')->nullable()->comment('内容');
            
            $table->float('rate')->default(0)->index()->comment('热度');
            $table->integer('user_id')->unsigned()->index()->comment('用户id');
            $table->boolean('nsfw')->default(0)->comment('nsfw');;
            $table->integer('category_id')->unsigned()->comment('分类id');
            $table->integer('tag_id')->default(0)->unsigned()->comment('标签id');
            $table->integer('upvotes')->default(1)->comment('赞');
            $table->integer('downvotes')->default(0)->comment('踩');
            $table->integer('comments_number')->default(0)->comment('评论数量');
            // approved by moderators so it can't be reported
            $table->timestamp('approved_at')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('bbs_topics');
    }
}
