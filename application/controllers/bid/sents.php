<?php

class Bid_Sents_Controller extends Base_Controller {

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
	 * View all of the sents.
	 *
	 * @return void
	 */
	public function get_index()
	{
		$sents = Bid_Sent::with(array('user'))->get();

		$this->layout->title   = 'Bid Sents';
		$this->layout->content = View::make('bid.sents.index')->with('sents', $sents);
	}

	/**
	 * Show the form to create a new sent.
	 *
	 * @return void
	 */
	public function get_create($user_id = null)
	{
		$this->layout->title   = 'New Bid Sent';
		$this->layout->content = View::make('bid.sents.create', array(
									'user_id' => $user_id,
								));
	}

	/**
	 * Create a new sent.
	 *
	 * @return Response
	 */
	public function post_create()
	{
		$validation = Validator::make(Input::all(), array(
			'user_id' => array('required', 'integer'),
			'delivery_time' => array('required'),
		));

		if($validation->valid())
		{
			$sent = new Bid_Sent;

			$sent->user_id = Input::get('user_id');
			$sent->delivery_time = Input::get('delivery_time');

			$sent->save();

			Session::flash('message', 'Added sent #'.$sent->id);

			return Redirect::to('bid/sents');
		}

		else
		{
			return Redirect::to('bid/sents/create')
					->with_errors($validation->errors)
					->with_input();
		}
	}

	/**
	 * View a specific sent.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function get_view($id)
	{
		$sent = Bid_Sent::with(array('user'))->find($id);

		if(is_null($sent))
		{
			return Redirect::to('bid/sents');
		}

		$this->layout->title   = 'Viewing Bid Sent #'.$id;
		$this->layout->content = View::make('bid.sents.view')->with('sent', $sent);
	}

	/**
	 * Show the form to edit a specific sent.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function get_edit($id)
	{
		$sent = Bid_Sent::find($id);

		if(is_null($sent))
		{
			return Redirect::to('bid/sents');
		}

		$this->layout->title   = 'Editing Bid Sent';
		$this->layout->content = View::make('bid.sents.edit')->with('sent', $sent);
	}

	/**
	 * Edit a specific sent.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function post_edit($id)
	{
		$validation = Validator::make(Input::all(), array(
			'user_id' => array('required', 'integer'),
			'delivery_time' => array('required'),
		));

		if($validation->valid())
		{
			$sent = Bid_Sent::find($id);

			if(is_null($sent))
			{
				return Redirect::to('bid/sents');
			}

			$sent->user_id = Input::get('user_id');
			$sent->delivery_time = Input::get('delivery_time');

			$sent->save();

			Session::flash('message', 'Updated sent #'.$sent->id);

			return Redirect::to('bid/sents');
		}

		else
		{
			return Redirect::to('bid/sents/edit/'.$id)
					->with_errors($validation->errors)
					->with_input();
		}
	}

	/**
	 * Delete a specific sent.
	 *
	 * @param  int       $id
	 * @return Response
	 */
	public function get_delete($id)
	{
		$sent = Bid_Sent::find($id);

		if( ! is_null($sent))
		{
			$sent->delete();

			Session::flash('message', 'Deleted sent #'.$sent->id);
		}

		return Redirect::to('bid/sents');
	}
}