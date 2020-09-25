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


/*================= Register Apis =====================*/
Route::group(['prefix' => 'auth', 'namespace' => 'AuthAPI'], function() {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('user-Info', 'AuthController@user_info') -> middleware('auth:api');    
});
/*============= Web APIs =============*/
//  Header & Footer Info  
Route::get("home-info", "HomeController@index"); 
//  POSTS  
Route::get("randPosts", "PostController@get_Random_Posts"); 
Route::get("lastedPosts" , "PostController@get_Lasted_Posts"); 
Route::get("post/{slug}", "PostController@show");  
Route::get("category/post/{slug}" , "PostController@get_Related_Posts");  
Route::get("search/posts/{searchVal}" , "PostController@search_Posts");    
//  Categories  
Route::get("allCategories", "CategoryController@get_All_Categories"); 
Route::get("category/{slug}/posts" , "CategoryController@get_Category_Posts" );
// Comments
Route::post("add-comment" , "CommentController@store")-> middleware('auth:api');  



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
    //  Comments  
    Route::resource("admin/comments","CommentController")->except("create" , "store" , "edit" , "update" );
    //  Messeges  
    Route::resource("admin/messeges","MessegeController")->except("create" , "store" , "edit" , "update" );
    //  Setting  
    Route::get("admin/setting" , "SettingController@getSiteInfo");    
    Route::put("admin/setting/update" , "SettingController@update");    
});


