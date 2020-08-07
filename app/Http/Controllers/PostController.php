<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function get_Random_Posts(){
        $posts = Post::inRandomOrder()->limit(9)->with("category" , "comments")->get();
        foreach( $posts as $post ){
            $post -> setAttribute("comments_count" , $post -> comments-> count() ); 
            $post -> setAttribute("added_at" , $post -> created_at -> diffForHumans() ); 
        }
        return response() -> json( $posts );
    }

    public function get_Lasted_Posts(){
        $posts = Post::orderBy('id' , "desc") ->  paginate(10);
        foreach( $posts as $post ){
            $post -> setAttribute("comments_count" , $post -> comments-> count() );  
            $post -> setAttribute("added_at" , $post -> created_at -> diffForHumans() ); 
        }
        return response() -> json( $posts );
    }

    public function get_Related_Posts( $slug )   // if is not $id not add Post Model in params
    {
        $post  = Post::where('slug', $slug ) -> first();
        $posts = Post::where('category_id', $post -> category_id ) -> inRandomOrder()->limit(3)->get(); 


        foreach( $posts as $post ){
            $post -> setAttribute("added_at" , $post -> created_at -> diffForHumans() ); 
            $post -> setAttribute("category_title" , $post -> category -> title ); 
            $post -> setAttribute("comments_count" , $post -> comments -> count() ); 
        } 
        return response() -> json( $posts );
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
    public function show( $slug )   // if is not $id not add Post Model in params
    {
        
        $post = Post::where("slug" , $slug )->with(["category", "comments"]) -> first();
        $post -> setAttribute("added_at" , $post -> created_at -> diffForHumans() );
        $post -> setAttribute("comments_count" , $post -> comments -> count() );


        $comments = $post -> comments;
        foreach( $comments as $comment ){
            $comment -> setAttribute("user" , $comment -> user );
            $comment -> setAttribute("added_at" , $post -> created_at -> diffForHumans() );
        }

        return response() -> json( $post );
        
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