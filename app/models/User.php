<?php

class User extends Base {

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
	protected $hidden = array('password', 'remember_token');

	protected $fillable = array('username','password','password_confirmation');

	public static $rules = array(
		'username'=>'required|unique:users|alpha_dash|min:4',
		'password'=>'required|alpha_num|between:4,8|confirmed',
		'password_confirmation'=>'required|alpha_num|between:4,8',
	);

}
