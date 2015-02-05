<?php
class SQSLecturerTableSeeder extends Seeder {
	public function run()
	{
	  	Lecturer::create(array(
			'id'		=> '448',
			'name' 		=> 'Prof. Dr. Zurni B Omar',
			'email' 	=> 'zurni@uum.edu.my',
			'college_id'=> 'CAS',
			'sch_id'	=> 'SQS',
			'room'		=> '4002 Science Quantitative Building'
		));
	  	Lecturer::create(array(
			'id'		=> 'int',
			'name' 		=> 'Name',
			'email' 	=> 'Mail',
			'college_id'=> 'CAS',
			'sch_id'	=> 'SQS'
		));		
	}
}