<?php

class User extends Eloquent {

	/**
	 * The name of the table associated with the model.
	 *
	 * @var string
	 */
	public static $table = 'users';

	/**
	 * Indicates if the model has update and creation timestamps.
	 *
	 * @var bool
	 */
	public static $timestamps = true;

	/**
	 * Establish the relationship between a user and text sents.
	 *
	 * @return Laravel\Database\Eloquent\Relationships\Has_Many
	 */
	public function text_sents()
	{
		return $this->has_many('Text_Sent');
	}

	/**
	 * Establish the relationship between a user and text receiveds.
	 *
	 * @return Laravel\Database\Eloquent\Relationships\Has_Many
	 */
	public function text_receiveds()
	{
		return $this->has_many('Text_Received');
	}

	/**
	 * Establish the relationship between a user and deliveryreq receieveds.
	 *
	 * @return Laravel\Database\Eloquent\Relationships\Has_Many
	 */
	public function deliveryreq_receieveds()
	{
		return $this->has_many('Deliveryreq_Receieved');
	}

	/**
	 * Establish the relationship between a user and bid sents.
	 *
	 * @return Laravel\Database\Eloquent\Relationships\Has_Many
	 */
	public function bid_sents()
	{
		return $this->has_many('Bid_Sent');
	}
}