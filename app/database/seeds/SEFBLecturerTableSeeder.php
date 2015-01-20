<?php
class SEFBLecturerTableSeeder extends Seeder {
	public function run()
	{
	  	Lecturer::create(array(
			'id'		=> 'int',
			'name' 		=> 'Lecturer Name',
			'email' 	=> 'Lecturer Email',
			'college_id'=> 'COB',
			'sch_id'	=> 'SEFB'
		));
	}
}