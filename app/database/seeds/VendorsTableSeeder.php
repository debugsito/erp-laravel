<?php

class VendorsTableSeeder extends Seeder {

	public function run()
	{
		Vendor::truncate();
		
		Vendor::create(array(
			'name' 				=> 'Vendor 1',
			'description' 		=> 'Vendor number one'
		));

		Vendor::create(array(
			'name' 				=> 'Vendor 2',
			'description' 		=> 'Vendor number two'
		));

		Vendor::create(array(
			'name' 				=> 'Vendor 3',
			'description' 		=> 'Vendor number three'
		));


	}

}