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
		$input = Input::all();
		$id = Auth::user()->id;
		$user = User::find($id);
		$user->password = Hash::make(Input::get('password'));

		$rules = array(
			'password'=>'required',
			'password_confirmation'=>'required:password'
		);

		$validator = Validator::make($input, $rules);

		if($validator->passes()) {
			if(Input::get('password') === Input::get('password_confirmation')){
				$user->save();
				return Redirect::to('profile/settings')->with('message', 'Your passwords has been updated successfully!');
			}
			return Redirect::to('profile/settings')->with('message', 'Your password did not match')->withErrors($validator)->withInput();
		} else {
			return Redirect::to('profile/settings')->with('message', 'Your password has not been updated!')->withErrors($validator)->withInput();
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

	public function getUserProfile()
	{
		$user = Auth::user();
		$this->layout->content = View::make('profile.userprofile');
	}

	public function postUpload()
	{
		$id = Auth::user()->id;
		$input = Input::all();
		$rules = array('photo'=>'required|mimes:jpg,gif,png|image|max:500');
		$validator = Validator::make($input, $rules);

		if($validator->fails()){
			return Redirect::to('profile/settings')->withErrors($validator)->withInput();
		}

		$extension = Input::file('photo')->getClientOriginalExtension();
		$directory = public_path('var/chroot/home/content/59/11581559/html/beta') . '/uploads/'.sha1($id);

		$filename = sha1($id.time()).".{$extension}";
		$upload_success = Input::file('photo')->move($directory,$filename);

		Image::make(Input::file('photo')->getRealPath())->resize(300,200)->save('foo.jpg');

		if($upload_success){
			$photo = new Photos(array(
				'location'=>URL::to('/uploads/'.sha1($id).'/'.$filename)
			));

			$photo->user_id = $id;
			$photo->save();

			return Redirect::to('profile/settings')->with('message', 'You have successfully uploaded your profile picture');
		} else {
			return Redirect::to('profile/settings')->with('message', 'Something went wrong.. Please try again.');
		}

		return Redirect::to('');
	}

}