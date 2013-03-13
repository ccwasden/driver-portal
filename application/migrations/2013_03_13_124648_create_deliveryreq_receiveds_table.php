<?php

class Create_Deliveryreq_Receiveds_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{	
		Schema::create('deliveryreq_receiveds', function($table)
		{
			$table->increments('id');

			$table->integer('user_id');
			$table->string('esl');
			$table->string('store_lat');
			$table->string('store_lng');
			$table->string('delivery_time');
			$table->string('pickup_time');
			$table->string('name');

			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('deliveryreq_receiveds');
	}

}