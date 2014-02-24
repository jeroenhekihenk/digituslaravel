<?php

class UsersController extends BaseController {
	protected $layout = 'layouts.main';

	public function __construct() {
    	$this->beforeFilter('csrf', array('on'=>'post'));

	}

	public function getRegister()
	{
		$this->layout->content = View::make('users.register');
	}

	public function postRegister() 
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
		 
		    return Redirect::to('login')->with('message', 'Thanks for registering! You can now login.');
		} else {
		    return Redirect::to('register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}

	public function getLogin()
	{
		$this->layout->content = View::make('users.login');
	}

	public function postLogin()
	{
		$input = Input::all();
		$remember = (isset($input['remember'])) ? true : null;
		$rules = array('email_or_username'=>'required', 'password'=>'required|min:6');
		$validator = Validator::make($input, $rules);
		$user = User::where('email', $input['email_or_username'])->orWhere('username', $input['email_or_username'])->first();

		if(!$user) {
			$attempt = false;
			return Redirect::to('login')->with('message', 'Your username/password combination was incorrect')->withInput();
		} else {
			$attempt = Auth::attempt(array( 'email' => $user->email, 'password'=>$input['password']), $remember);
			return Redirect::to('profile/dashboard')->with('message', 'You are now logged in!');
		}

		
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('login')->with('message', 'You are now logged out.');
	}

	public function store()
	{
		$input = Input::all();
		$remember = (isset($input['remember'])) ? true : null;
		$rules = array('email_or_username'=>'required', 'password'=>'required|min:6');
		$validator = Validator::make($input, $rules);

		if ($validator->fails())
		{
			return Redirect::to('login')->withErrors($validator)->withInput();
		}

		$user = User::where('email', $input['email_or_username'])->orWhere('username', $input['email_or_username'])->first();

		if(!$user) {
			$attempt = false;
		} else {
			$attempt = Auth::attempt(array( 'email' => $user->email, 'password'=>$input['password']), $remember);
		}
	}

}