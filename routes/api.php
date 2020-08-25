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

/*============= Web APIs =============*/
//  POSTS  
Route::get("randPosts", "PostController@get_Random_Posts");  // ==> ("/api/randPosts")
Route::get("lastedPosts" , "PostController@get_Lasted_Posts");  // ==> ("/api/lastedPosts")
Route::get("post/{slug}", "PostController@show");  // ==> ("api/post/{slug}")
Route::get("category/post/{slug}" , "PostController@get_Related_Posts");   // ==> ("api/category/post/{slug}")
Route::get("search/posts/{searchVal}" , "PostController@search_Posts");    // ==> ("api/search/posts/{searchVal}")
//  Categories  
Route::get("allCategories", "CategoryController@get_All_Categories");  // ==> ("/api/randPosts")
Route::get("category/{slug}/posts" , "CategoryController@get_Category_Posts" );



/*============= Admin APIs =============*/
Route::namespace("admin")->group( function (){

    //  Dashboard  
    Route::get("admin/statistics" , "DashboardController@site_Statistics");
    Route::get("admin/lasted-comments" , "DashboardController@lasted_Comments");
    Route::get("admin/lasted-messeges" , "DashboardController@lasted_Messeges");    
    //  Users  
    Route::get("admin/users" , "UserController@index");
    //  Categories  
    Route::resource("admin/categories","CategoryController")->except("create" , "edit" , "show");
    //  Posts  
    Route::resource("admin/posts","PostController")->except("create" , "edit");



    //  Site Setting 
});
