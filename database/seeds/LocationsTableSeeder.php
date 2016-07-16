<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
			'name' => 'Ijsbaan twente',
			'sports' => '{}',
			'lat' => 52.240780,
			'long' => 6.831319
		]);
    }
}
