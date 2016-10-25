<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStocksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stocks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('item_id');
			$table->datetime('entry_date');
			$table->integer('location_id')->nullable();
			$table->integer('stock_type_id')->nullable();
			$table->string('movement_type_id')->nullable();
			$table->integer('quantity');
			$table->string('material_document_no')->nullable();
			$table->integer('order_category_id')->nullable();
			$table->integer('order_data')->nullable();
			$table->text('remark')->nullable();
			$table->integer('entry_user_id');
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
		Schema::drop('stocks');
	}

}
