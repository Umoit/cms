<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('标题');
            $table->string('img')->comment('预览图')->nullable();
            $table->text('content')->nullable()->comment('内容');
            $table->integer('game_id')->default(0)->unsigned()->comment('分类id');
            $table->string('host')->comment('主办方');
            $table->string('duration')->comment('比赛时间期限');
            $table->integer('status')->comment('状态');

            
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
        Schema::dropIfExists('matches');
    }
}
