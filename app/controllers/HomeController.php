<?php

class HomeController extends BaseController {

	public function news()
	{
		$data = PostZH::whereRaw('levels_id = 1')
				->whereNull('deleted_at')
				->get();
		return Response::json($data);
	}

	public function notice()
	{
		$data = PostZH::whereRaw('levels_id = 3')
				->whereNull('deleted_at')
				->get();
		return Response::json($data);
	}

	public function activeNotice()
	{
		$data = PostZH::whereRaw('levels_id = 2')
				->whereNull('deleted_at')
				->get();
		return Response::json($data);
	}

	public function activeNews()
	{
		$data = PostZH::whereRaw('levels_id = 4')
				->whereNull('deleted_at')
				->get();
		return Response::json($data);
	}

	public function travel()
	{
		$data = Travel::where('passed','1')
				->whereNull('deleted_at')
				->get();
		return Response::json($data);
	}

	// 显示新闻详情页
	public function showPost($id)
	{
		$post = PostZH::find($id);
		return Response::json($post);
	}

	// 发布游记
	public function postTravel()
	{
		$json = false;
		$travel = new Travel;
		$travel->title = Input::get('title');
		$travel->author = Input::get('author');
		$travel->content = Input::get('content');
		if($travel->save())
		{
			$json = true;
		}else{
			$json = false;
		}
		return Response::json($json);
	}

	public function showTravel($id)
	{
		$travel = Travel::find($id);
		return Response::json($travel);
	}
	public function switchShop()
	{
		$type = Input::get('type');
		$shops = Shop::whereShopCategoriesId($type)->get();
		return Response::json($shops);
	}
	public function shopInfo($id)
	{
		$shop = Shop::find($id);
		return Response::json($shop);
	}
	

//	public function switchShop()
//	{
//		$type = Input::get('type');
//		$shops = Shop::whereShopCategoriesId($type)->first();
//		return Response::json($shops);
//	}

}