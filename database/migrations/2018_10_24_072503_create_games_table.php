<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');


            // $table->string('slug')->comment('短链接');
            $table->time('date')->comment('比赛时间');
            $table->integer('team1_id')->comment('队伍1');
            $table->integer('team2_id')->comment('队伍2');
            $table->integer('status')->comment('比赛状态');
            
            $table->string('data')->comment('比赛数据');


            $table->integer('type_id')->comment('比赛项目');
            $table->integer('event_id')->unsigned()->comment('分类id');


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
        Schema::dropIfExists('games');
    }
}
