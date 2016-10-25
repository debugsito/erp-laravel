<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class MovementTypesTableSeeder extends Seeder {

	public function run()
	{

		MovementType::truncate();

		MovementType::create(array(
			'name' 			=> 	'201 (GI for cost center)',
			'description' 	=>	'201 (GI for cost center)'
		));

		MovementType::create(array(
			'name' 			=> 	'321 (Stock move from Insp.)',
			'description' 	=>	'321 (Stock move from Insp.)'
		));

		/*$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			MovementType::create([

			]);
		}*/
	}

}