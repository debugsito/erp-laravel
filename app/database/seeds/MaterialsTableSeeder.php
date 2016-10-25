<?php 
use Faker\Factory as Faker;

class MaterialsTableSeeder extends Seeder {

	public function run()
	{

		ItemMaster::truncate();

		$faker = Faker::create();

		for ($i=0; $i < 50; $i++) {

			ItemMaster::create(array(
				'name' 			=> 'Material-' . $i ,
				'description' 	=> 'Material '.$i .': '.$faker->text,
				'unit_item_id'	=> 1,
				'type_id'		=> 1,
				'status_id'		=> 1
			));

		}

	}

}


