<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
		$this->call(LocationsTableSeeder::class);
		$this->call(VideosTableSeeder::class);
		$this->call(GroupsTableSeeder::class);
		$this->call(AnalysesTableSeeder::class);
    }
}
