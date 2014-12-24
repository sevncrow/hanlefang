<?php

class PostController extends \BaseController {

	public function __construct()
	{
		App::setLocale('zh');
	}


	/**
	 * [news 显示中文新闻列表页]
	 * @return [view] [array]
	 */
	public function news()
	{
		$posts = PostZH::whereRaw('levels_id = 1')
						->with('levels')
						->get();
		return View::make('admin.post.index')
				->with('posts',$posts)
				->with('header','新闻列表');
	}

	/**
	 * [active 显示中文活动页面]
	 * @return [view] [array]
	 */
	public function activeNews()
	{
		$posts = PostZH::whereRaw('levels_id = 2')
						->with('levels')
						->get();
		return View::make('admin.post.index')
				->with('posts',$posts)
				->with('header','活动列表');
	}

	/**
	 * [board 显示中文公告页面]
	 * @return [view] [array]
	 */
	public function notice()
	{
		$posts = PostZH::whereRaw('levels_id = 3')
						->with('levels')
						->get();
		return View::make('admin.post.index')
				->with('posts',$posts)
				->with('header','公告列表');
	}

	/**
	 * [board 显示中文往期活动页面]
	 * @return [view] [array]
	 */
	public function activeNotice()
	{
		$posts = PostZH::whereRaw('levels_id = 4')
				->with('levels')
				->get();
		return View::make('admin.post.index')
				->with('posts',$posts)
				->with('header','往期活动列表');
	}


	public function dispatchRoute($id)
	{
		switch ($id) 
			{
				case '1':
					return 'admin/news';
				break;
				case '2':
					return 'admin/active-notice';
				break;
				case '3':
					return 'admin/notice';
				break;
				case '4':
					return 'admin/active-notice';
				break;
			}
	}


	
	
	/**
	 * [index 显示全部post]
	 * @return [view] [array]
	 */
	public function index()
	{
		$posts = PostZH::with('levels')->get();
		return View::make('admin.post.index',compact('posts',$posts));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /post/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$levels = Level::all();
		return View::make('admin.post.create',compact('levels',$levels));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /post
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($post=Input::all(),PostZH::$rules);
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$post = PostZH::create($post);
		$route = $this->dispatchRoute($post->levels_id);
		return Redirect::to(''.$route.'');
	}

	/**
	 * Display the specified resource.
	 * GET /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = PostZH::find($id);
		return  View::make('admin.post.show',compact('post',$post));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /post/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = PostZH::find($id);
		return  View::make('admin.post.edit',compact('post',$post));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$post = PostZH::findOrFail($id);
		$validator = Validator::make($data = Input::except('levels_id'), PostZH::$rules);
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$post->update($data);
		$route = $this->dispatchRoute($post->levels_id);
		return Redirect::to(''.$route.'');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = PostZH::find($id);
		$id = $post->levels_id;
		$post->delete($id);
		$route = $this->dispatchRoute($id);
		return Redirect::to(''.$route.'');
	}




	/**
	 * [faq 显示中文问答页面]
	 * @return [view] [array]
	 */
	/*public function faq()
	{
		$posts = PostZH::whereRaw('levels_id = 4')
						->with('levels')
						->get();
		return View::make('admin.post.index',compact('posts',$posts));
	}*/

	/**
	 * [site 显示景点信息页面]
	 * @return [view] [array]
	 */
	/*public function site()
	{
		$posts = PostZH::whereRaw('levels_id = 5')
						->with('levels')
						->get();
		return View::make('admin.post.index',compact('posts',$posts));
	}*/

	/**
	 * [place 显示体验场所页面]
	 * @return [view] [array]
	 */
	/*public function place()
	{
		$posts = PostZH::whereRaw('levels_id = 6')
						->with('levels')
						->get();
		return View::make('admin.post.index',compact('posts',$posts));
	}*/

	/**
	 * [shop 显示购物页面]
	 * @return [view] [array]
	 */
	/*public function shop()
	{
		$posts = PostZH::whereRaw('levels_id = 7')
						->with('levels')
						->get();
		return View::make('admin.post.index',compact('posts',$posts));
	}*/



}