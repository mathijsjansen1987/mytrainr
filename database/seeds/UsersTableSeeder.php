<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
	/**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
		DB::table('users')->insert([
			'name' => 'Mathijs Jansen',
			'email' => 'mathijs@code.rehab',
			'password' => bcrypt('pass'),
		]);

		DB::table('users')->insert([
			'name' => 'Ge ten Kampe',
			'email' => 'getenkampe@hotmail.com',
			'password' => bcrypt('pass'),
		]);
	}
}
