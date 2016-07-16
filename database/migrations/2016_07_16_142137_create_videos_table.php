<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
	/**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('videos', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('sporter_id');
			$table->integer('location_id');
			$table->integer('sport_id');
			$table->integer('record_device_id');
			$table->string('cover');
			$table->string('cloud_fullPath');
			$table->string('local_fullPath');
			$table->boolean('cloud_synced');
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
		    Schema::drop('videos');
	}
}
