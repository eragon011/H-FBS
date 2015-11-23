<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//Model::unguard();

		App\User::create([
			'name' => 'Admin',
			'email' => 'admin@gmail.com',
			'password' => bcrypt('1234'),
		]);

		App\User::create([
			'name' => 'Jeff',
			'email' => 'Jeff@gmail.com',
			'password' => bcrypt('134679'),
		]);

		App\User::create([
			'name' => 'Dump',
			'email' => 'Dump@gmail.com',
			'password' => bcrypt('134679'),
		]);

		App\User::create([
			'name' => 'Dream',
			'email' => 'Dream@gmail.com',
			'password' => bcrypt('134679'),
		]);

		App\User::create([
			'name' => 'Ball',
			'email' => 'Ball@gmail.com',
			'password' => bcrypt('134679'),
		]);

		App\User::create([
			'name' => 'Kie',
			'email' => 'Kie@gmail.com',
			'password' => bcrypt('134679'),
		]);
	}

}
