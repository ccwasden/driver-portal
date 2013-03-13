<?php

class Bid_Sent extends Eloquent {

	/**
	 * The name of the table associated with the model.
	 *
	 * @var string
	 */
	public static $table = 'bid_sents';

	/**
	 * Indicates if the model has update and creation timestamps.
	 *
	 * @var bool
	 */
	public static $timestamps = true;

	/**
	 * Establish the relationship between a sent and a user.
	 *
	 * @return Laravel\Database\Eloquent\Relationships\Belongs_To
	 */
	public function user()
	{
		return $this->belongs_to('User');
	}
}