<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CustomersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 30) as $index)
		{
			Customer::create([
				'client_first_name' => $faker->name,
				'client_last_name' => $faker->name,
				'address_stree_1' => $faker->address,
				'phone_number' => $faker->phoneNumber,
				'city' => $faker->city,
				'company_name' => 'Company '.$index
			]);
		}
	}

}