<?php
class SQSLecturerTableSeeder extends Seeder {
	public function run()
	{
	  	Lecturer::create(array(
			'id'		=> 'int',
			'name' 		=> 'Lecturer Name',
			'email' 	=> 'Lecturer Mail',
			'college_id'=> 'CAS',
			'sch_id'	=> 'SQS'
		));
	}
}