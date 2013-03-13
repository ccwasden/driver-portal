<?php

class Create_Bid_Sents_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{	
		Schema::create('bid_sents', function($table)
		{
			$table->increments('id');

			$table->integer('user_id');
			$table->string('delivery_time');

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
		Schema::drop('bid_sents');
	}

}