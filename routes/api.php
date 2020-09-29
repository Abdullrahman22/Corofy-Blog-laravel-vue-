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






/*================= Web Register Apis =====================*/
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
// Contact Us
Route::post("add-messege" , "ContactController@store");  







/*============= Admin APIs =============*/
Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function() {
    //  Dashboard  
    Route::get("statistics" , "DashboardController@site_Statistics");
    Route::get("lasted-comments" , "DashboardController@lasted_Comments");
    Route::get("lasted-messeges" , "DashboardController@lasted_Messeges");    
    //  Users  
    Route::get("users" , "UserController@index");
    //  Categories  
    Route::resource("categories","CategoryController")->except("create" , "edit" , "show");
    //  Posts  
    Route::resource("posts","PostController")->except("create" , "edit");
    //  Comments  
    Route::resource("comments","CommentController")->except("create" , "store" , "edit" , "update" );
    //  Messeges  
    Route::resource("messeges","MessegeController")->except("create" , "store" , "edit" , "update" );
    //  Setting  
    Route::get("setting" , "SettingController@getSiteInfo");    
    Route::put("setting/update" , "SettingController@update");  
    //  Admin-info 
    Route::get("admin-panal-info" , "AdminController@getAdminInfo");    

});


