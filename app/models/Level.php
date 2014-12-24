<?php

class Level extends \Eloquent {

	public $timestamps = false;

	public static $rules = [
		'id'=>'required',
		'key'=>'required',
		'key_kr'=>'required',
		'comment'=>'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['id','key','key_kr','comment'];


	public function postZH()
	{
		return $this->hasMany('PostZH');
	}

}