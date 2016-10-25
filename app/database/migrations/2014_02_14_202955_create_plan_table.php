<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('plan', function ($table) {
			$table->create();
			$table->increments('id');
			$table->integer('user_id')->nullable();
			$table->integer('line_id')->nullable();
			$table->integer('item_master_id')->nullable();
			$table->date('production_start_date')->nullable();
			$table->date('production_end_date')->nullable();
			$table->time('production_start_time')->nullable();
			$table->time('production_end_time')->nullable();
			$table->text('comment')->nullable();
			$table->text('order')->nullable();
			$table->integer('quantity')->nullable();
			$table->integer('status_plan_id');
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('plan');
	}

}
