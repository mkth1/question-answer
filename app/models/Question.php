<?php

class Question extends Base {
	protected $guarded = array();

	public static $rules = array(
		'question'=>'required|min:10|max:255',
		'solved'=>'in:0,1'
	);

	public function user() {
		return $this->belongsTo('User');
	}

	public function answers() {
		return $this->hasMany('Answer');
	}

	public static function unsolved() {
		return static::where('solved','=',0)->orderBy('id','DESC')->paginate(8);
	}

	public static function your_questions() {
		return static::where('user_id','=',Auth::user()->id)->paginate(8);
	}

	public static function search( $keyword ) {
		return static::where('question','LIKE','%'.$keyword.'%')->paginate(8);
	}


}