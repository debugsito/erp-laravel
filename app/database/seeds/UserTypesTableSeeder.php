<?php 

class UserTypesTableSeeder extends Seeder {

	public function run()
	{

		UserType::truncate();
		
		UserType::create(array(
			'name' 			=> 	'Admin',
			'description' 	=>	'Administrador'
		));

	}

}


