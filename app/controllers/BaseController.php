<?php

class BaseController extends Controller {

	public function __construct()
	{
		if(Auth::check()) {
			$id = Auth::user()->id;
		}
		else {
			$id = false;
		}

		View::share('id', $id);
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}