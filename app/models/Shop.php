<?php

class Shop extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['id','title','thumb_url','content','shop_categories_id'];

	public function shopCategories()
	{
		return $this->belongsTo('ShopCategory');
	}

}