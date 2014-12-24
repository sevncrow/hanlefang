<?php

class PostKRController extends \BaseController {


	public function __construct()
	{
		App::setLocale('kr');
	}

	/**
	 * [news 显示中文新闻列表页]
	 * @return [view] [array]
	 */
	public function news()
	{
		$posts = PostKR::whereRaw('levels_id = 1')
						->with('levels')
						->get();
		return View::make('admin.post.index',compact('posts',$posts));
	}

	/**
	 * [active 显示中文活动页面]
	 * @return [view] [array]
	 */
	public function active()
	{
		$posts = PostKR::whereRaw('levels_id = 2')
						->with('levels')
						->get();
		return View::make('admin.post.index',compact('posts',$posts));
	}

	/**
	 * [board 显示中文公告页面]
	 * @return [view] [array]
	 */
	public function board()
	{
		$posts = PostKR::whereRaw('levels_id = 3')
						->with('levels')
						->get();
		return View::make('admin.post.index',compact('posts',$posts));
	}
	
	/**
	 * [faq 显示中文问答页面]
	 * @return [view] [array]
	 */
	public function faq()
	{
		$posts = PostKR::whereRaw('levels_id = 4')
						->with('levels')
						->get();
		return View::make('admin.post.index',compact('posts',$posts));
	}

	/**
	 * [site 显示景点信息页面]
	 * @return [view] [array]
	 */
	public function site()
	{
		$posts = PostKR::whereRaw('levels_id = 5')
						->with('levels')
						->get();
		return View::make('admin.post.index',compact('posts',$posts));
	}

	/**
	 * [place 显示体验场所页面]
	 * @return [view] [array]
	 */
	public function place()
	{
		$posts = PostKR::whereRaw('levels_id = 6')
						->with('levels')
						->get();
		return View::make('admin.post.index',compact('posts',$posts));
	}

	/**
	 * [shop 显示购物页面]
	 * @return [view] [array]
	 */
	public function shop()
	{
		$posts = PostKR::whereRaw('levels_id = 7')
						->with('levels')
						->get();
		return View::make('admin.post.index',compact('posts',$posts));
	}

/**
	 * [index 显示全部post]
	 * @return [view] [array]
	 */
	public function index()
	{
		$posts = PostKR::with('levels')->get();
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
		App::setLocale('kr');
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
		$validator = Validator::make($post=Input::all(),PostKR::$rules);
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		PostKR::create($post);
		return Redirect::to('admin/kr/post');
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
		$post = PostKR::find($id);
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
		$post = PostKR::find($id);
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
		$post = PostKR::findOrFail($id);
		$validator = Validator::make($data = Input::except('levels_id'), PostKR::$rules);
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$post->update($data);
		return Redirect::to('admin/kr/post');

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
		$post = PostKR::find($id);
		$post->delete($id);
		return Redirect::to('admin/kr/post');	
	}

}
