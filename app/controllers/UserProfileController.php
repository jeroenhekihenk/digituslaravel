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