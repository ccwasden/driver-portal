<?php

class Create_Text_Receiveds_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{	
		Schema::create('text_receiveds', function($table)
		{
			$table->increments('id');

			$table->integer('user_id');
			$table->string('content');

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
		Schema::drop('text_receiveds');
	}

}