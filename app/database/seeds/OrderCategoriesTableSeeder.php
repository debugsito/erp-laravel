<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class OrderCategoriesTableSeeder extends Seeder {

	public function run()
	{
		/*$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			OrderCategory::create([

			]);
		}*/

		OrderCategory::truncate();

		OrderCategory::create(array(
			'name' 			=> 	'Quality Management',
			'description' 	=>	'Quality Management'
		));

		OrderCategory::create(array(
			'name' 			=> 	'Production Order',
			'description' 	=>	'Production Order'
		));
		
	}

}