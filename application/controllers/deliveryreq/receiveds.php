<?php

class Deliveryreq_Receiveds_Controller extends Base_Controller {

	/**
	 * The layout being used by the controller.
	 *
	 * @var string
	 */
	public $layout = 'layouts.scaffold';

	/**
	 * Indicates if the controller uses RESTful routing.
	 *
	 * @var bool
	 */
	public $restful = true;

	/**
	 * View all of the receiveds.
	 *
	 * @return void
	 */
	public function get_index()
	{
		$receiveds = Deliveryreq_Received::with(array('user'))->get();

		$this->layout->title   = 'Deliveryreq Receiveds';
		$this->layout->content = View::make('deliveryreq.receiveds.index')->with('receiveds', $receiveds);
	}

	/**
	 * Show the form to create a new received.
	 *
	 * @return void
	 */
	public function get_create($user_id = null)
	{
		$this->layout->title   = 'New Deliveryreq Received';
		$this->layout->content = View::make('deliveryreq.receiveds.create', array(
									'user_id' => $user_id,
								));
	}

	/**
	 * Create a new received.
	 *
	 * @return Response
	 */
	public function post_create()
	{
		$validation = Validator::make(Input::all(), array(
			'user_id' => array('required', 'integer'),
			'esl' => array('required'),
			'store_lat' => array('required'),
			'store_lng' => array('required'),
			'delivery_time' => array('required'),
			'pickup_time' => array('required'),
			'name' => array('required'),
		));

		if($validation->valid())
		{
			$received = new Deliveryreq_Received;

			$received->user_id = Input::get('user_id');
			$received->esl = Input::get('esl');
			$received->store_lat = Input::get('store_lat');
			$received->store_lng = Input::get('store_lng');
			$received->delivery_time = Input::get('delivery_time');
			$received->pickup_time = Input::get('pickup_time');
			$received->name = Input::get('name');

			$received->save();

			Session::flash('message', 'Added received #'.$received->id);

			return Redirect::to('deliveryreq/receiveds');
		}

		else
		{
			return Redirect::to('deliveryreq/receiveds/create')
					->with_errors($validation->errors)
					->with_input();
		}
	}

	/**
	 * View a specific received.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function get_view($id)
	{
		$received = Deliveryreq_Received::with(array('user'))->find($id);

		if(is_null($received))
		{
			return Redirect::to('deliveryreq/receiveds');
		}

		$this->layout->title   = 'Viewing Deliveryreq Received #'.$id;
		$this->layout->content = View::make('deliveryreq.receiveds.view')->with('received', $received);
	}

	/**
	 * Show the form to edit a specific received.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function get_edit($id)
	{
		$received = Deliveryreq_Received::find($id);

		if(is_null($received))
		{
			return Redirect::to('deliveryreq/receiveds');
		}

		$this->layout->title   = 'Editing Deliveryreq Received';
		$this->layout->content = View::make('deliveryreq.receiveds.edit')->with('received', $received);
	}

	/**
	 * Edit a specific received.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function post_edit($id)
	{
		$validation = Validator::make(Input::all(), array(
			'user_id' => array('required', 'integer'),
			'esl' => array('required'),
			'store_lat' => array('required'),
			'store_lng' => array('required'),
			'delivery_time' => array('required'),
			'pickup_time' => array('required'),
			'name' => array('required'),
		));

		if($validation->valid())
		{
			$received = Deliveryreq_Received::find($id);

			if(is_null($received))
			{
				return Redirect::to('deliveryreq/receiveds');
			}

			$received->user_id = Input::get('user_id');
			$received->esl = Input::get('esl');
			$received->store_lat = Input::get('store_lat');
			$received->store_lng = Input::get('store_lng');
			$received->delivery_time = Input::get('delivery_time');
			$received->pickup_time = Input::get('pickup_time');
			$received->name = Input::get('name');

			$received->save();

			Session::flash('message', 'Updated received #'.$received->id);

			return Redirect::to('deliveryreq/receiveds');
		}

		else
		{
			return Redirect::to('deliveryreq/receiveds/edit/'.$id)
					->with_errors($validation->errors)
					->with_input();
		}
	}

	/**
	 * Delete a specific received.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function get_delete($id)
	{
		$received = Deliveryreq_Received::find($id);

		if( ! is_null($received))
		{
			$received->delete();

			Session::flash('message', 'Deleted received #'.$received->id);
		}

		return Redirect::to('deliveryreq/receiveds');
	}
}