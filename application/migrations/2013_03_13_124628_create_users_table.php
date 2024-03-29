<?php

class Create_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{	
		Schema::create('users', function($table)
		{
			$table->increments('id');

			$table->string('username');
			$table->string('password');
			$table->string('foursquare_token');
			$table->string('foursquare_id');
			$table->string('phone');

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
		Schema::drop('users');
	}

}