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
			'cover' => 'http://mydomain.com/storage/covers/'.str_random(20).'.png',
			'cloud_fullPath' => 'http://mydomain.com/storage/videos/'.str_random(20).'.mp4',
			'local_fullPath' => '/storage/DCIM/local/'.str_random(20).'.mp4',
			'local_fullPath' => true
		]);

		DB::table('videos')->insert([
			'location_id' => 2,
			'sport_id' => 1,
			'record_device_id' => 1,
			'cover' => 'http://mydomain.com/storage/covers/'.str_random(20).'.png',
			'cloud_fullPath' => 'http://mydomain.com/storage/videos/'.str_random(20).'.mp4',
			'local_fullPath' => '/storage/DCIM/local/'.str_random(20).'.mp4',
			'local_fullPath' => true
		]);

		DB::table('videos')->insert([
			'location_id' => 2,
			'sport_id' => 1,
			'record_device_id' => 1,
			'cover' => 'http://mydomain.com/storage/covers/'.str_random(20).'.png',
			'cloud_fullPath' => 'http://mydomain.com/storage/videos/'.str_random(20).'.mp4',
			'local_fullPath' => '/storage/DCIM/local/'.str_random(20).'.mp4',
			'local_fullPath' => true
		]);

	}
}
