<?php

class Text_Sents_Controller extends Base_Controller {

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
		$sents = Text_Sent::with(array('user'))->get();

		$this->layout->title   = 'Text Sents';
		$this->layout->content = View::make('text.sents.index')->with('sents', $sents);
	}

	/**
	 * Show the form to create a new sent.
	 *
	 * @return void
	 */
	public function get_create($user_id = null)
	{
		$this->layout->title   = 'New Text Sent';
		$this->layout->content = View::make('text.sents.create', array(
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
			'content' => array('required'),
		));

		if($validation->valid())
		{
			$sent = new Text_Sent;

			$sent->user_id = Input::get('user_id');
			$sent->content = Input::get('content');

			$sent->save();

			Session::flash('message', 'Added sent #'.$sent->id);

			return Redirect::to('text/sents');
		}

		else
		{
			return Redirect::to('text/sents/create')
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
		$sent = Text_Sent::with(array('user'))->find($id);

		if(is_null($sent))
		{
			return Redirect::to('text/sents');
		}

		$this->layout->title   = 'Viewing Text Sent #'.$id;
		$this->layout->content = View::make('text.sents.view')->with('sent', $sent);
	}

	/**
	 * Show the form to edit a specific sent.
	 *
	 * @param  int   $id
	 * @return void
	 */
	public function get_edit($id)
	{
		$sent = Text_Sent::find($id);

		if(is_null($sent))
		{
			return Redirect::to('text/sents');
		}

		$this->layout->title   = 'Editing Text Sent';
		$this->layout->content = View::make('text.sents.edit')->with('sent', $sent);
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
			'content' => array('required'),
		));

		if($validation->valid())
		{
			$sent = Text_Sent::find($id);

			if(is_null($sent))
			{
				return Redirect::to('text/sents');
			}

			$sent->user_id = Input::get('user_id');
			$sent->content = Input::get('content');

			$sent->save();

			Session::flash('message', 'Updated sent #'.$sent->id);

			return Redirect::to('text/sents');
		}

		else
		{
			return Redirect::to('text/sents/edit/'.$id)
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
		$sent = Text_Sent::find($id);

		if( ! is_null($sent))
		{
			$sent->delete();

			Session::flash('message', 'Deleted sent #'.$sent->id);
		}

		return Redirect::to('text/sents');
	}
}