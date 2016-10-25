
<?php
// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PlanProductionsSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Plan::create([
				'user_id' => 1,
				'line_id' => $index,
				'item_master_id' => $index,
				'production_start_date' => date('Y-m-d'),
				'production_end_date' => date('Y-m-d'),
				'quantity' => $index + 100,
				'status_plan_id' => 1
			]);
		}
	}

}