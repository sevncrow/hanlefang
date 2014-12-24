<?php

class SearchController extends \BaseController {

	public function __construct()
	{
		$this->searchKey = Input::get('search-key');
		$this->searchValue = Input::get('search-value');
		$this->data = null;
	}


	public function travel()
	{
		if($this->searchKey=='all'){
			$this->data = Travel::searchAll($this->searchValue)->get();
		}else{
			$this->data = Travel::search($this->searchKey,$this->searchValue)->get();
		}
		return Response::json($this->data);
	}

	public function activeNotice()
	{
		if($this->searchKey=='all'){
			$this->data = PostZH::searchActiveNoticeAll($this->searchValue)->get();
		}else{
			$this->data = PostZH::searchActiveNotice($this->searchKey,$this->searchValue)->get();
		}
		return Response::json($this->data);
	}
}