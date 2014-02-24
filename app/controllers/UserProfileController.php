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

	public function getAdminSettings()
	{
		$users = User::all();

		$this->layout->content = View::make('profile.adminsettings', compact('users'));
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
			return Redirect::to('profile/settings')->with('message', 'Your profile has been updated successfully!');
		} else {
			return Redirect::to('profile/settings')->with('message', 'Your profile has not been updated.');
		}

	}

	public function updateEmail()
	{

	}

	public function updatePass()
	{
		$id = Auth::user()->id;
		$user = User::find($id);
		$user->password = Hash::make(Input::get('password'));

		if($user->save() ) {
			return Redirect::to('profile/settings')->with('message', 'Your password has been updated successfully!');
		} else {
			return Redirect::to('profile/settings')->with('message', 'Your password has not been updated!');
		}


	}

	public function updateDesc()
	{
		$id = Auth::user()->id;
		$user = User::find($id);
		$user->description = Input::get('description');

		if($user->save() ) {
			return Redirect::to('profile/settings')->with('message', 'Your description has been updated successfully!');
		} else {
			return Redirect::to('profile/settings')->with('message', 'Your description has not been updated.');
		}
	}

	public function newUser()
	{
		$validator = Validator::make(Input::all(), User::$rules);
 
    	if ($validator->passes()) {
		    $user = new User;
		    $user->username = Input::get('username');
		    $user->firstname = Input::get('firstname');
		    $user->lastname = Input::get('lastname');
		    $user->email = Input::get('email');
		    $user->password = Hash::make(Input::get('password'));
		    $user->save();
		 
		    return Redirect::to('profile/adminsettings')->with('message', 'Thanks for registering this new user! He/She can now login.');
		} else {
		    return Redirect::to('profile/adminsettings')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}

}