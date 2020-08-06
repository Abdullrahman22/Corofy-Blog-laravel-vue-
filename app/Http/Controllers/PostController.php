<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function get_Random_Posts(){
        $posts = Post::inRandomOrder()->limit(9)->with("category" , "comments")->get();
        foreach( $posts as $post ){
            $post -> setAttribute("comments_count" , $post -> comments-> count() ); 
            $post -> setAttribute("added_at" , $post -> created_at -> diffForHumans() ); 
        }
        return $posts ;
    }

    public function get_Lasted_Posts(){
        $posts = Post::orderBy('id' , "desc") ->  paginate(5);
        foreach( $posts as $post ){
            $post -> setAttribute("comments_count" , $post -> comments-> count() );  
            $post -> setAttribute("added_at" , $post -> created_at -> diffForHumans() ); 
        }
        return $posts ;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
