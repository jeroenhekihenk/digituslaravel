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

	public function updateProfile()
	{
		$id = Auth::user()->id;
		$validator = Validator::make(Input::all(), User::$rules);
 
    	if ($validator->passes()) {
		    $user = User;
		    $user->username = Input::get('username');
		    $user->firstname = Input::get('firstname');
		    $user->lastname = Input::get('lastname');
		    $user->email = Input::get('email');
		    $user->password = Hash::make(Input::get('password'));
		    $user->save();
		 
		    return Redirect::to('user/dashboard')->with('message', 'Thanks for editing your profile!');
		} else {
		    return Redirect::to('user/settings')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}

	}

	public function getMessages()
	{
		$this->layout->content = View::make('profile.messages');
	}

}