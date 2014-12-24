<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Travel extends \Eloquent {

	use SoftDeletingTrait;
	protected $dates = ['deleted_at'];

	public static $rules = [
		'title' => 'required',
		'author' => 'required',
		'content' => 'required',
	];

	protected $defaults = array(
		'passed' => '0',
	);


	protected $table = 'travels';
	protected $fillable = ['id','title','content','author','passed'];

	public function __construct(array $attributes = array())
	{
	    $this->setRawAttributes($this->defaults, true);
	    parent::__construct($attributes);
	}

	public function scopeSearch($query, $key,$value)
    {
        return $query->where($key,'like','%'.$value.'%')
        		->where('passed','=','1','and')
        		->whereNull('deleted_at');
    }

    public function scopeSearchAll($query,$value)
    {
        return $query
        		->where('title','like','%'.$value.'%')
        		->where(function($query){
        			$query->where('passed','1')
        			->whereNull('deleted_at');
        		})
        		->orWhere('author','like','%'.$value.'%')
        		->where(function($query){
        			$query->where('passed','1')
        			->whereNull('deleted_at');
        		})
        		->orWhere('content','like','%'.$value.'%')
        		->where(function($query){
        			$query->where('passed','1')
        			->whereNull('deleted_at');
        		});
    }

}