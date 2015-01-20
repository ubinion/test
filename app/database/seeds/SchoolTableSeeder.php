<?php
 
class SchoolTableSeeder extends Seeder {
 
  public function run()
  {

  	School::create(array(
		'id'		=> 'SSD',
		'name' 		=> 'School of Social Development',
		'college_id'=> 'CAS'
	));

	School::create(array(
		'id'		=> 'SQS',
		'name' 		=> 'School of Quantitative Sciences',
		'college_id'=> 'CAS'
	));

	School::create(array(
		'id'		=> 'SOC',
		'name' 		=> 'School of Computing',
		'college_id'=> 'CAS'
	));

	School::create(array(
		'id'		=> 'SEML',
		'name' 		=> 'School of Education and Modern Languages',
		'college_id'=> 'CAS'
	));

	School::create(array(
		'id'		=> 'SMMTC',
		'name' 		=> 'School of Multimedia Technology and Communication',
		'college_id'=> 'CAS'
	));

	School::create(array(
		'id'		=> 'IBS',
		'name' 		=> 'Islamic Business School',
		'college_id'=> 'COB'
	));
	School::create(array(
		'id'		=> 'STML',
		'name' 		=> 'School of Technology Management and Logistics',
		'college_id'=> 'COB'
	));
	School::create(array(
		'id'		=> 'SEFB',
		'name' 		=> 'School of Economics, Finance and Banking',
		'college_id'=> 'COB'
	));
	School::create(array(
		'id'		=> 'SBM',
		'name' 		=> 'School of Business Management',
		'college_id'=> 'COB'
	));
	School::create(array(
		'id'		=> 'SA',
		'name' 		=> 'School of Accountancy',
		'college_id'=> 'COB'
	));
	School::create(array(
		'id'		=> 'SIS',
		'name' 		=> 'School of International Studies',
		'college_id'=> 'COLGIS'
	));
	School::create(array(
		'id'		=> 'SG',
		'name' 		=> 'School of Government',
		'college_id'=> 'COLGIS'
	));
	School::create(array(
		'id'		=> 'STHEM',
		'name' 		=> 'School of Tourism, Hospitality and Environmental Management',
		'college_id'=> 'COLGIS'
	));
	School::create(array(
		'id'		=> 'SL',
		'name' 		=> 'School of Law',
		'college_id'=> 'COLGIS'
	));

  }
 
}