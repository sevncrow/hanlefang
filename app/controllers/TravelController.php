<?php

class TravelController extends \BaseController {

	/**
	 * [__construct  设置默认语言为汉语]
	 */
	public function __construct()
	{
		App::setLocale('zh');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$travels = Travel::all();
		return View::make('admin.travel.index')
				->with('header','游记列表')
				->with('travels',$travels);
	}


	/**
	 * 后台不能新增游记
	 *
	 * @return Response
	 */
	/*public function create()
	{
		return View::make('admin.travel.create');
	}*/


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	/*public function store()
	{
	}
	*/


	/**
	 * 后台不能修改别人的游记
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$travel = Travel::find($id);
		return  View::make('admin.travel.show',compact('travel',$travel));
	}


	/**
	 * 后台不能修改别人的游记
	 *
	 * @param  int  $id
	 * @return Response
	 */
	/*public function edit($id)
	{
		//
	}*/


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
/*	public function update($id)
	{
		//
	}*/


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$post = Travel::find($id);
		$post->delete($id);
		return Redirect::to('admin/travel');
	}


	public function access($id)
	{
		$post = Travel::find($id);
		$post->passed = '1';
		$post->save();
		return Redirect::to('admin/travel');
	}

	public function hidden($id)
	{
		$post = Travel::find($id);
		$post->passed = '0';
		$post->save();
		return Redirect::to('admin/travel');
	}


}
