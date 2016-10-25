<?php

use Faker\Factory as Faker;

class LinesTableSeeder extends Seeder {

	public function run()
	{
		Line::truncate();

		$faker = Faker::create();

		for ($i=0; $i < 30; $i++) { 
			
			Line::create(array(
				'name' 				=> 'Line ' . $i,
				'description' 		=> $faker->text
			));

		}
		
	}

}