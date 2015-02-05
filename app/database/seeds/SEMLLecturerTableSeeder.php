<?php
class SEMLLecturerTableSeeder extends Seeder {
	public function run()
	{
	  	Lecturer::create(array(
			'id'		=> '4041',
			'name' 		=> 'Prof. Dr. Nena P Valdez',
			'email' 	=> 'nena@uum.edu.my',
			'college_id'=> 'CAS',
			'sch_id'	=> 'SEML',
			'room'		=> 'room'
		));
	  	Lecturer::create(array(
			'id'		=> '474',
			'name' 		=> 'Prof. Dr. Rosna Bt Awang Hashim',
			'email' 	=> 'rosna@uum.edu.my',
			'college_id'=> 'CAS',
			'sch_id'	=> 'SEML',
			'room'		=> '0.93 Science Cognative Building & Education'
		));
	  	Lecturer::create(array(
			'id'		=> '5190',
			'name' 		=> 'Prof. Dr. Abdul Moqim Rahmanzai',
			'email' 	=> 'moqim@uum.edu.my',
			'college_id'=> 'CAS',
			'sch_id'	=> 'SEML'
		));
	  	Lecturer::create(array(
			'id'		=> 'int',
			'name' 		=> 'Name',
			'email' 	=> 'Mail',
			'college_id'=> 'CAS',
			'sch_id'	=> 'SEML'
		));						
	}
}