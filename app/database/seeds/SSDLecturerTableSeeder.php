<?php
class SSDLecturerTableSeeder extends Seeder {
	public function run()
	{
	  	Lecturer::create(array(
			'id'		=> '4525',
			'name' 		=> 'Prof. Dr. Ismail Bin Baba',
			'email' 	=> 'ismailbaba@uum.edu.my',
			'college_id'=> 'CAS',
			'sch_id'	=> 'SSD'
		));
	  	Lecturer::create(array(
			'id'		=> '4679',
			'name' 		=> 'Prof. Dr. Yahaya bin Mahamood',
			'email' 	=> 'drymood@uum.edu.my',
			'college_id'=> 'CAS',
			'sch_id'	=> 'SSD',
			'room'		=> '015 Social Development Building'
		));
	  	Lecturer::create(array(
			'id'		=> '320',
			'name' 		=> 'Prof. Dr. Najib B Hj Ahmad Marzuki',
			'email' 	=> 'najib320@uum.edu.my',
			'college_id'=> 'CAS',
			'sch_id'	=> 'SSD',
			'room'		=> '102 Social Development Building'
		));
	  	Lecturer::create(array(
			'id'		=> 'int',
			'name' 		=> 'Name',
			'email' 	=> 'Mail',
			'college_id'=> 'CAS',
			'sch_id'	=> 'SSD'
		));						
	}
}