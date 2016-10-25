<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEfficiencyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('efficiency', function ($table) {
			$table->create();
			$table->increments('id');
			$table->integer('modelo_id');
			$table->integer('line_id')->nullable();
			$table->integer('shift_id')->nullable();
			$table->float('CT')->nullable();
			$table->integer('production_plan')->nullable();
			$table->integer('production_real')->nullable();
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
		Schema::drop('efficiency');
	}

}
