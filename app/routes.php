<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	// return "<h1>韩乐坊，坐等韩国给界面</h1>";
	return Redirect::route('login');
});

Route::get('/login',function()
{
	return View::make('admin.login');
});

Route::post('/login',array('as'=>'login',function()
{
	$user = array(
		'username'=>Input::get('username'),
		'password'=>Input::get('password')
		);
	if(Auth::attempt($user))
		return Redirect::to('admin/home');
   	return Redirect::route('login')
		->with('flash_error','用户名或密码错误！');
}));

//退出
Route::get('/logout',function()
{
	Auth::logout();
	return Redirect::to('/');
});

Route::group(['before'=>'auth','prefix' => 'admin'], function() {
	
	Route::get('/home',function(){
		return View::make('admin/home');
	});

	Route::get('/news','PostController@news');
	Route::get('/active-news','PostController@activeNews');
	Route::get('/notice','PostController@notice');
	Route::get('/active-notice','PostController@activeNotice');
	Route::resource('post','PostController');
	Route::resource('shop','ShopController');
	Route::resource('travel','TravelController');
	Route::post('/travel-access/{id}','TravelController@access');
	Route::post('/travel-hidden/{id}','TravelController@hidden');

	Route::group(array('prefix' => 'kr'), function() {
		Route::get('/news','PostKRController@news');
		Route::get('/active','PostKRController@active');
		Route::get('/board','PostKRController@board');
		Route::get('/faq','PostKRController@faq');
		Route::get('/site','PostKRController@site');
		Route::get('/place','PostKRController@plcae');
		Route::get('/shop','PostKRController@shop');
		Route::resource('post','PostKRController');
	});
});





Route::group(array('prefix' => 'api'), function() {
	Route::get('/news','HomeController@news');
	Route::get('/notice','HomeController@notice');
	Route::get('/active-notice','HomeController@activeNotice');
	Route::get('/active-news','HomeController@activeNews');
	Route::get('/travel','HomeController@travel');

	Route::post('/search-travel','SearchController@travel');
	Route::post('/search-active-notice','SearchController@activeNotice');

	Route::get('/kr/news','HomeKRController@news');
	Route::get('/kr/notice','HomeKRController@notice');
	Route::get('/kr/active-notice','HomeKRController@activeNotice');
	Route::get('/kr/active-news','HomeKRController@activeNews');
	Route::get('/kr/travel','HomeKRController@travel');

	Route::post('/kr/search-travel','SearchKRController@travel');
	Route::post('/kr/search-active-notice','SearchKRController@activeNotice');
	
	Route::get('post/{id?}','HomeController@showPost');

	// 发布游记
	Route::post('post-travel','HomeController@postTravel');
	Route::get('travel/{id?}','HomeController@showTravel');

	Route::get('/kr/post/{id?}','HomeController@showPost');

	// 发布游记
	/*Route::post('post-travel','HomeController@postTravel');
	Route::get('travel/{id?}','HomeController@showTravel');*/

//	Route::get('switch-shop','HomeController@switchShop');


	Route::get('switch-shop','HomeController@switchShop');
	Route::get('shop/{id?}','HomeController@shopInfo');
	
});

Route::get('/test',function(){
});


	