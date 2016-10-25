<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		User::truncate();
		
		User::create(array(
			'name' 			=> 'Israel',
			'email' 		=> 'admin@admin.com',
			'password'     	=> 'password',
			'usertype_id' 	=>	1,
	       	'active'		=> 	1
		));

	}

}