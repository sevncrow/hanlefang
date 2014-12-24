<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class PostKR extends \Eloquent {

	use SoftDeletingTrait;
	protected $dates = ['deleted_at'];

	public static $rules = [
		'title'=>'required',
		// 'author'=>'required',
		'content'=>'required'
	];

	protected $defaults = array(
		'author' => '관리자',
		);

	protected $table = 'posts_kr';
	protected $fillable = ['id','levels_id','title','content','author'];

	public function __construct(array $attributes = array())
	{
	    $this->setRawAttributes($this->defaults, true);
	    parent::__construct($attributes);
	}
	
	public function levels()
	{
		return $this->belongsTo('Level');
	}

	public function scopeSearchActiveNotice($query, $key,$value)
	{
		 return $query->where($key,'like','%'.$value.'%')
		 		->where('levels_id','2')
        		->whereNull('deleted_at');
	}

	public function scopeSearchActiveNoticeAll($query,$value)
	{
		 return $query
        		->where('title','like','%'.$value.'%')
        		->where(function($query){
        			$query->where('levels_id','2')
        			->whereNull('deleted_at');
        		})
        		->orWhere('content','like','%'.$value.'%')
        		->where(function($query){
        			$query->where('levels_id','2')
        			->whereNull('deleted_at');
        		});
	}
}