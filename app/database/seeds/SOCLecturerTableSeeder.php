<?php
class SOCLecturerTableSeeder extends Seeder {
	public function run()
	{
	  	Lecturer::create(array(
			'id'		=> '747',
			'name' 		=> 'Prof. Dr. Suhaidi B Hassan',
			'email' 	=> 'suhaidi@uum.edu.my',
			'college_id'=> 'CAS',
			'sch_id'	=> 'SOC',
			'room'		=> '1020.3 BTM'
		));
	  	Lecturer::create(array(
			'id'		=> '759',
			'name' 		=> 'Prof. Dr. Zulikha Bt Jamaludin',
			'email' 	=> 'zulie@uum.edu.my',
			'college_id'=> 'CAS',
			'sch_id'	=> 'SOC',
			'room'		=> '2076 SMMTC'
		));
	  	Lecturer::create(array(
			'id'		=> '741',
			'name' 		=> 'Prof. Dr. Zulkhairi B Md Dahalin',
			'email' 	=> 'zul@uum.edu.my',
			'college_id'=> 'CAS',
			'sch_id'	=> 'SOC'
		));
	  	Lecturer::create(array(
			'id'		=> 'int',
			'name' 		=> 'Name',
			'email' 	=> 'Mail',
			'college_id'=> 'CAS',
			'sch_id'	=> 'SOC'
		));							
	}
}