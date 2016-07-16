<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('groups')->insert([
			'name' => 'Java groep',
			'sport_id' => 1,
			'sporters' => '{}'
		]);
    }
}
