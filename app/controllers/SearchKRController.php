<?php

class SearchKRController extends \BaseController {

	public function __construct()
	{
		$this->searchKey = Input::get('search-key');
		$this->searchValue = Input::get('search-value');
		$this->data = null;
	}



	public function activeNotice()
	{
		if($this->searchKey=='all'){
			$this->data = PostKR::searchActiveNoticeAll($this->searchValue)->get();
		}else{
			$this->data = PostKR::searchActiveNotice($this->searchKey,$this->searchValue)->get();
		}
		return Response::json($this->data);
	}
}