<?php
class SMMTCLecturerTableSeeder extends Seeder {
	public function run()
	{
	  	Lecturer::create(array(
			'id'		=> '123',
			'name' 		=> 'Tommy Yeap',
			'email' 	=> 'ms.yeap91@gmail.com',
			'college_id'=> 'CAS',
			'sch_id'	=> 'SMMTC'
		));

		Lecturer::create(array(
			'id'		=>	'5885',
			'name' 		=> 'Lecturer Full Name',
			'email' 	=> 'xxx@uum.edu.com',
			'college_id'=> 'CAS',
			'sch_id'	=> 'SMMTC',
			'room'		=>	'2034 SOC (If have room info)'
		));
	}
}