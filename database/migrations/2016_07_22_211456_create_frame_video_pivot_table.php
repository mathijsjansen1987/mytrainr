<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrameVideoPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frame_video', function (Blueprint $table) {
            $table->integer('frame_id')->unsigned()->index();
            $table->foreign('frame_id')->references('id')->on('frames')->onDelete('cascade');
            $table->integer('video_id')->unsigned()->index();
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
            $table->primary(['frame_id', 'video_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('frame_video');
    }
}
