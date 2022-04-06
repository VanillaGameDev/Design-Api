<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create(
			'orders',
			function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->unsignedBigInteger('user_id');
				$table->string('status');
				$table->datetime('order_date');
				$table->datetime('payment_due');
				$table->string('payment_status');
				$table->decimal('base_total_price', 16, 2)->default(0);
				$table->decimal('tax_amount', 16, 2)->default(0);
				$table->string('customer_name');
				$table->foreign('user_id')->references('id')->on('users');
				$table->foreign('approved_by')->references('id')->on('users');
				$table->foreign('cancelled_by')->references('id')->on('users');
				$table->timestamps();
			}
		);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('orders');
	}
}
