<?php

class Text_Receiveds_Controller extends Base_Controller {

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
		$receiveds = Text_Received::with(array('user'))->get();

		$this->layout->title   = 'Text Receiveds';
		$this->layout->content = View::make('text.receiveds.index')->with('receiveds', $receiveds);
	}

	/**
	 * Show the form to create a new received.
	 *
	 * @return void
	 */
	public function get_create($user_id = null)
	{
		$this->layout->title   = 'New Text Received';
		$this->layout->content = View::make('text.receiveds.create', array(
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
			'content' => array('required'),
		));

		if($validation->valid())
		{
			$received = new Text_Received;

			$received->user_id = Input::get('user_id');
			$received->content = Input::get('content');

			$received->save();

			Session::flash('message', 'Added received #'.$received->id);

			return Redirect::to('text/receiveds');
		}

		else
		{
			return Redirect::to('text/receiveds/create')
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
		$received = Text_Received::with(array('user'))->find($id);

		if(is_null($received))
		{
			return Redirect::to('text/receiveds');
		}

		$this->layout->title   = 'Viewing Text Received #'.$id;
		$this->layout->content = View::make('text.receiveds.view')->with('received', $received);
	}

	/**
	 * Show the form to edit a specific received.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function get_edit($id)
	{
		$received = Text_Received::find($id);

		if(is_null($received))
		{
			return Redirect::to('text/receiveds');
		}

		$this->layout->title   = 'Editing Text Received';
		$this->layout->content = View::make('text.receiveds.edit')->with('received', $received);
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
			'content' => array('required'),
		));

		if($validation->valid())
		{
			$received = Text_Received::find($id);

			if(is_null($received))
			{
				return Redirect::to('text/receiveds');
			}

			$received->user_id = Input::get('user_id');
			$received->content = Input::get('content');

			$received->save();

			Session::flash('message', 'Updated received #'.$received->id);

			return Redirect::to('text/receiveds');
		}

		else
		{
			return Redirect::to('text/receiveds/edit/'.$id)
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
		$received = Text_Received::find($id);

		if( ! is_null($received))
		{
			$received->delete();

			Session::flash('message', 'Deleted received #'.$received->id);
		}

		return Redirect::to('text/receiveds');
	}
}