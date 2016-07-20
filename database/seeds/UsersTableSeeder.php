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
			'name' => 'Ijsclub Lonneker',
			'email' => 'ijsclub@lonneker.nl',
			'password' => bcrypt('pass'),
		]);

		DB::table('users')->insert([
			'name' => 'Ge ten Kampe',
			'email' => 'getenkampe@hotmail.com',
			'password' => bcrypt('pass'),
		]);

		DB::table('users')->insert([
			'name' => 'Mathijs Jansen',
			'email' => 'mathijs@code.rehab',
			'password' => bcrypt('pass'),
		]);


		DB::table('roles')->insert([
			'id' => 1,
			'name' => 'club',
			'display_name' => 'Club',
			'description' => 'Club'
		]);

		DB::table('roles')->insert([
			'id' => 2,
			'name' => 'coach',
			'display_name' => 'Coach',
			'description' => 'coach'
		]);

		DB::table('roles')->insert([
			'id' => 3,
			'name' => 'sporter',
			'display_name' => 'Sporter',
			'description' => 'Sporter'
		]);

		DB::table('role_user')->insert([
			'user_id' => 1,
			'role_id' => 1,
		]);

		DB::table('role_user')->insert([
			'user_id' => 2,
			'role_id' => 2,
		]);

		DB::table('role_user')->insert([
			'user_id' => 3,
			'role_id' => 3,
		]);

	}
}
