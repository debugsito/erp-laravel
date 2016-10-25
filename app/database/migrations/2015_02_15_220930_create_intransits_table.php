<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIntransitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('intransits', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('no_purchase');
			$table->integer('vendor_id');
			$table->date('order_date');
			$table->integer('item_id');
			$table->integer('order_qty');
			$table->integer('receipt_qty')->nullable();
			$table->date('delivery_date')->nullable();
			$table->integer('status_id');
			$table->integer('user_id');
			$table->integer('confirm')->nullable();
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
		Schema::drop('intransits');
	}

}
