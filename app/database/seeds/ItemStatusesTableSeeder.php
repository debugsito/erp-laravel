<?php

class ItemStatusesTableSeeder extends Seeder {

	public function run()
	{
		ItemStatus::create(array(
			'name' 			=> 'E  -  D',
			'description' 	=> 'E  -  D'
		));
	}

}