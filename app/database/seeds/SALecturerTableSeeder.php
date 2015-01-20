<?php
class SALecturerTableSeeder extends Seeder {
	public function run()
	{
	  	Lecturer::create(array(
			'id'		=> 'int',
			'name' 		=> 'Lecturer Name',
			'email' 	=> 'Lecturer email',
			'college_id'=> 'COB',
			'sch_id'	=> 'SA'
		));
	}
}