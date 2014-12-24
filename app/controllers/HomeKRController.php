<?php

class HomeKRController extends BaseController {

	public function news()
	{
		$data = PostKR::whereRaw('levels_id = 1')
				->whereNull('deleted_at')
				->get();
		return Response::json($data);
	}

	public function notice()
	{
		$data = PostKR::whereRaw('levels_id = 3')
				->whereNull('deleted_at')
				->get();
		return Response::json($data);
	}

	public function activeNotice()
	{
		$data = PostKR::whereRaw('levels_id = 2')
				->whereNull('deleted_at')
				->get();
		return Response::json($data);
	}

	public function activeNews()
	{
		$data = PostKR::whereRaw('levels_id = 4')
				->whereNull('deleted_at')
				->get();
		return Response::json($data);
	}

	public function travel()
	{
		$data = Travel::where('passed','1')
				->where('lang','0')
				->whereNull('deleted_at')
				->get();
		return Response::json($data);
	}

	// 显示新闻详情页
	public function showPost($id)
	{
		$post = PostKR::find($id);
		return Response::json($post);
	}




}