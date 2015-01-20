<?php
class SISLecturerTableSeeder extends Seeder {
	public function run()
	{
	  	Lecturer::create(array(
			'id'		=> 'int',
			'name' 		=> 'Lecturer Name',
			'email' 	=> 'Lecturer Email',
			'college_id'=> 'COLGIS',
			'sch_id'	=> 'SIS'
		));
	}
}