<?php

class Base extends Eloquent {

	//protected $guarded = array();

	//public static $rules = array();

	public static function validate( $data ) {
		return Validator::make($data, static::$rules);
	}
}
