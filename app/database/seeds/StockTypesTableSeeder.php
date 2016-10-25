<?php 

class StockTypesTableSeeder extends Seeder {

	public function run()
	{

		StockType::truncate();
		
		StockType::create(array(
			'name' 			=> 	'Unrestricted',
			'description' 	=>	'Unrestricted'
		));

		StockType::create(array(
			'name' 			=> 	'Inspection',
			'description' 	=>	'Inspection'
		));

		StockType::create(array(
			'name' 			=> 	'Returned',
			'description' 	=>	'Returned'
		));

		StockType::create(array(
			'name' 			=> 	'Blocked',
			'description' 	=>	'Blocked'
		));

	}

}


