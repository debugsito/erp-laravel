<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SalesOrdersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 30) as $index)
		{
			SalesOrder::create([
				'customer_id' => $index,
				'item_id'	=> $index,
				'quantity'	=> $index + 100,
				'ship_date'	=> date('Y-m-d'),
				'delivery_date' => date('Y-m-d'),
			]);
		}
	}

}