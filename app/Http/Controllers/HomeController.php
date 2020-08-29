<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Setting;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index()
    {
        /*========== Posts ============*/
        $posts = Post::orderby('id','desc')-> limit(3)-> withCount("comments") -> get();
        foreach( $posts as $post ){
            $post -> setAttribute("added_at" , $post -> created_at -> diffForHumans() ); 
        }

        /*========== categories ============*/
        $categories = Category::get();

        /*========== Site Name ============*/
        $setting = Setting::find(1);
        $site_name = $setting -> site_name;
        return view('app' , compact( 'posts', 'categories' , 'site_name' ) );
    }
}
