<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	public function roles()
	{
		return $this->belongsToMany('Role', 'users_roles');
	}

	public function isEmployee()
	{
		$roles = $this->roles->toArray();
		return !empty($roles);
	}

	public function hasRole($check)
	{
		return in_array($check, array_fetch($this->roles->toArray(), 'name'));
	}

	private function getIdInArray($array, $term)
    {
        foreach ($array as $key => $value) {
            if ($value == $term) {
                return $key;
            }
        }
 
        throw new UnexpectedValueException;
    }

    public function makeEmployee($title)
    {
        $assigned_roles = array();
 
        $roles = array_fetch(Role::all()->toArray(), 'name');
 
        switch ($title) {
            case 'super_admin':
                $assigned_roles[] = $this->getIdInArray($roles, 'edit_customer');
                $assigned_roles[] = $this->getIdInArray($roles, 'delete_customer');
            case 'admin':
                $assigned_roles[] = $this->getIdInArray($roles, 'create_customer');
            case 'concierge':
                $assigned_roles[] = $this->getIdInArray($roles, 'add_points');
                $assigned_roles[] = $this->getIdInArray($roles, 'redeem_points');
                break;
            default:
                throw new \Exception("The employee status entered does not exist");
        }
 
        $this->roles()->attach($assigned_roles);
    }

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public static $rules = array(
	'username'=>'required|alpha|unique:users|min:2',
    'firstname'=>'required|alpha|min:2',
    'lastname'=>'required|alpha|min:2',
    'email'=>'required|email|unique:users',
    'password'=>'required|alpha_num|between:6,12|confirmed',
    'password_confirmation'=>'required|alpha_num|between:6,12'
    );

}