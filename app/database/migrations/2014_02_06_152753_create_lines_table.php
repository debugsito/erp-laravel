<?php

use Illuminate\Database\Migrations\Migration;

class CreateLinesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('lines', function ($table) {
			$table->create();
			$table->increments('id');
			$table->string('name');
			$table->text('description')->nullable();
			$table->integer('arduino_id')->nullable();
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
		Schema::drop('lines');
	}

}