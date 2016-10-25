<?php

class ItemUnitsTableSeeder extends Seeder {

	public function run()
	{
		//$faker = Faker::create();

		ItemUnit::truncate();
		
		ItemUnit::create([
			'name' => 'PC', 
			'description' => 'PC'
		]);
	}

}