<?php

use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
	/**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
		DB::table('videos')->insert([
			'location_id' => 1,
			'sport_id' => 1,
			'record_device_id' => 1,
			'cover' => 'https://db2ih2bbf7xxb.cloudfront.net/d722dc71cdcee54f983451bc508c6754319bc6b2/images/video/105_177.png',
			'cloud_fullPath' => 'https://db2ih2bbf7xxb.cloudfront.net/getenkampe/videos/original/start_mathijs_2.MOV',
			'local_fullPath' => '/storage/DCIM/local/'.str_random(20).'.mp4',
			'local_fullPath' => true
		]);

		DB::table('videos')->insert([
			'location_id' => 2,
			'sport_id' => 1,
			'record_device_id' => 1,
			'cover' => 'https://db2ih2bbf7xxb.cloudfront.net/d722dc71cdcee54f983451bc508c6754319bc6b2/images/video/105_177.png',
			'cloud_fullPath' => 'https://db2ih2bbf7xxb.cloudfront.net/getenkampe/videos/original/start_mathijs_2.MOV',
			'local_fullPath' => '/storage/DCIM/local/'.str_random(20).'.mp4',
			'local_fullPath' => true
		]);

	}
}
