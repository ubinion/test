<?php
 
class UserTableSeeder extends Seeder {
 
  public function run()
  {

  	$user = User::create(array(
		'first_name'=> 'Yeap',
		'last_name' => 'Tommy',
		'email' 	=> 'ms.yeap91@gmail.com',
		'password' 	=> '$2y$10$D6LoVIYLxleCtM7rt5rBN.fXW1Lm0GZZvR4jnfC9wzit5xmoaNytO',
		'active'	=>	1
	));
  }
 
}