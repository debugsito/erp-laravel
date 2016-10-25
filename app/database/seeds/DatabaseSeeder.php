<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTypesTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('VendorsTableSeeder');
		$this->call('StockTypesTableSeeder');
		$this->call('ItemTypesTableSeeder');
		$this->call('MaterialsTableSeeder');
		$this->call('OrderCategoriesTableSeeder');
		$this->call('MovementTypesTableSeeder');
		$this->call('ItemUnitsTableSeeder');
		$this->call('LinesTableSeeder');
		$this->call('ItemStatusesTableSeeder');
		$this->call('CustomersTableSeeder');
		$this->call('SalesOrdersTableSeeder');
		$this->call('PlanProductionsSeeder');
	}

}