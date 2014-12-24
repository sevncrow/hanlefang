<?php

class ShopController extends \BaseController {

	/**
	 * Display a listing of shops
	 *
	 * @return Response
	 */
	public function index()
	{
		$shops = Shop::with('shopCategories')->get();
		return View::make('admin.shop.index', compact('shops'));
	}

	/**
	 * Show the form for creating a new shop
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = shopCategory::all();
		return View::make('admin.shop.create',compact('categories'));
	}

	/**
	 * Store a newly created shop in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Shop::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		$timestamp = time();
		Image::make($data['file'])
				->resize(200, 150)
				->save('upload/shop/'.$timestamp.'.jpg');
		$data['thumb_url'] = '/upload/shop/'.$timestamp.'.jpg';
	 	Shop::create($data);
		return Redirect::route('admin.shop.index');
	}

	/**
	 * Display the specified shop.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$shop = Shop::findOrFail($id);

		return View::make('admin.shop.show', compact('shop'));
	}

	/**
	 * Show the form for editing the specified shop.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$shop = Shop::find($id);

		return View::make('admin.shop.edit', compact('shop'));
	}

	/**
	 * Update the specified shop in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$shop = Shop::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Shop::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		if (file_exists($data['file'])&&file_exists($shop->thumb_url))
		{
			unlink($shop->thumb_url);
			$timestamp = time();
			Image::make($data['file'])
				->resize(200, 150)
				->save('upload/shop/'.$timestamp.'.jpg');
			$data['thumb_url'] = '/upload/shop/'.$timestamp.'.jpg';
		}
		$shop->update($data);

		return Redirect::route('admin.shop.index');
	}

	/**
	 * Remove the specified shop from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$shop = Shop::findOrFail($id);
		if (file_exists($shop->thumb_url))
		{
			unlink($shop->thumb_url);
		}
		Shop::destroy($id);

		return Redirect::route('admin.shop.index');
	}

}
