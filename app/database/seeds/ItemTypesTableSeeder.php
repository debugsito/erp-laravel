<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ItemTypesTableSeeder extends Seeder {

	public function run()
	{

		ItemType::truncate();

		ItemType::create(array(
			'name' 			=> 'HALB',
			'description' 	=> 'HALB'
		));

		ItemType::create(array(
			'name' 			=> 'RAW MATERIAL',
			'description' 	=> 'RAW MATERIAL'
		));

		/*$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			ItemType::create([

			]);
		}*/
	}

}