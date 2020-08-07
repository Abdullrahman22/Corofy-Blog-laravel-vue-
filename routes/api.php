<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*===============  POSTS  ==================*/
Route::get("randPosts", "PostController@get_Random_Posts");  // ==> ("/api/randPosts")
Route::get("lastedPosts" , "PostController@get_Lasted_Posts");  // ==> ("/api/lastedPosts")
Route::get("post/{slug}", "PostController@show");  // ==> ("api/post/{slug}")
Route::get("category/post/{slug}" , "PostController@get_Related_Posts");   // ==> ("category/post/{slug}")

/*===============  Categories  ==================*/
Route::get("allCategories", "CategoryController@get_All_Categories");  // ==> ("/api/randPosts")