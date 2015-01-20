<?php
class SOCLecturerTableSeeder extends Seeder {
	public function run()
	{
	  	Lecturer::create(array(
			'id'		=> 'int',
			'name' 		=> 'Lecturer Name',
			'email' 	=> 'Lecturer Mail',
			'college_id'=> 'CAS',
			'sch_id'	=> 'SOC'
		));
	}
}