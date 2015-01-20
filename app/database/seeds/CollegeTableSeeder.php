<?php
 
class CollegeTableSeeder extends Seeder {
 
  public function run()
  {
  	College::create(array(
		'id'		=> 'CAS',
		'name' 		=> 'College Of Art and Science'
	));

	College::create(array(
		'id'		=> 'COB',
		'name' 		=> 'College Of Business'
	));

	College::create(array(
		'id'		=> 'COLGIS',
		'name' 		=> 'College Of Law,Government and International Studies'
	));
  }
}