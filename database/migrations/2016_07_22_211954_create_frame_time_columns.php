<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrameTimeColumns extends Migration
{
	/**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::table('frames', function ($table) {
			$table->boolean('range');
			$table->string('time_start');
			$table->string('time_end');
		});
	}

	/**
     * Reverse the migrations.
     *
     * @return void
     */
	public function down()
	{
		//
	}
}
