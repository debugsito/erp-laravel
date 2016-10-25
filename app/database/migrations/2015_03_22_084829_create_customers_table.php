<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('client_first_name');
			$table->string('client_last_name');
			$table->string('address_stree_1');
			$table->string('address_stree_2')->nullable();
			$table->string('phone_number')->nullable();
			$table->text('details_note')->nullable();
			$table->string('company_name');
			$table->string('cell_phone')->nullable();
			$table->string('email')->nullable();
			$table->integer('status');
			$table->string('city');
			$table->integer('zipcode');
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
		Schema::drop('customers');
	}

}
