<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('CollegeTableSeeder');
		$this->call('SchoolTableSeeder');

		$this->call('SMMTCLecturerTableSeeder');
	}
}