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

/**
 * Home Route
 */
Route::get('/', array('as' => 'home', function()
{
	return View::make('movie.home');
}));

/**
 * Movie detail route
 */
Route::get('detail', array('as' => 'detail', function()
{
	return View::make('movie.detail');
}));

/**
 * Movie search route
 */
Route::get('search', array('as' => 'search', function()
{
	return View::make('movie.search');
}));

/**
 * Movie search submit route
 */
Route::post('search', array('as' => 'searchpost', function()
{
	$query = Input::get('search');
	$movieService= new Bogardo\Services\Movie();

	$result = $movieService->search($query);
	if ($result) {
		return Response::json($result);
	}
}));

/**
 * Movie search template render route
 */
Route::post('item', array('as' => 'parseitem', function(){
	$item = Input::all();
	echo View::make('movie.render.item')->with('item', $item);
	exit;
}));



/*
|--------------------------------------------------------------------------
| Testing/Debugging routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('test', function(){
	$movieService = new Bogardo\Services\Movie();

	$movieService = new Bogardo\Services\Themoviedb();

	//$movieService->config();


	$result = $movieService->movie("10193");
	//$result = $movieService->search("Toy Story 3");
});
