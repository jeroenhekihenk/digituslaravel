<?php

class UserProfileController extends BaseController {

	protected $layout = 'layouts.main';

	public function __construct() 
	{
		$this->beforeFilter('auth', array('only'=>array('getDashboard')));
	}

	public function getDashboard()
	{
		$this->layout->content = View::make('profile.dashboard');
	}

	public function getPlan()
	{
		$this->layout->content = View::make('profile.plan');
	}

	public function getProfile()
	{
		$this->layout->content = View::make('profile.settings');
	}

	public function getMessages()
	{
		$this->layout->content = View::make('profile.messages');
	}

	public function updateName()
	{
		$id = Auth::user()->id;
		$user = User::find($id);
		$user->username = Input::get('username');
		$user->firstname = Input::get('firstname');
		$user->lastname = Input::get('lastname');

		if($user->save() ) {
			return Redirect::to('profile/settings')->with('message', 'Your profile has been updated!');
		} else {
			return Redirect::to('profile/settings')->with('message', 'Your profile has not been updated');
		}

	}

	public function updateEmail()
	{

	}

	public function updatePass()
	{

	}

	public function updateDesc()
	{
		
	}

}