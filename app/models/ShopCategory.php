<?php

class ShopCategory extends \Eloquent {

	public $timestamps = false;

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['id','text'];

	public function shop()
	{
		return $this->hasMany('Shop');
	}

}