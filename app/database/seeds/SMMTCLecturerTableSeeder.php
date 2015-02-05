<?php
class SMMTCLecturerTableSeeder extends Seeder {
	public function run()
	{
	  	Lecturer::create(array(
			'id'		=> '402',
			'name' 		=> 'Prof. Dr. Che Su Bt Mustaffa',
			'email' 	=> 'chesu402@uum.edu.my',
			'college_id'=> 'CAS',
			'sch_id'	=> 'SMMTC',
			'room'		=> '2.19 Block A'
		));
	  	Lecturer::create(array(
			'id'		=> '123',
			'name' 		=> 'Yeap',
			'email' 	=> 'email',
			'college_id'=> 'CAS',
			'sch_id'	=> 'SMMTC'
		));		

	}
}