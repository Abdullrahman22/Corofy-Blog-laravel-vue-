<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::orderBy("id","desc")->with("user")->paginate(50);
        foreach( $comments as $comment ){
            $comment -> setAttribute("added_at" , $comment -> created_at -> diffForHumans() ); 
        }
        return response()->json($comments);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::where("id" , $id )->with("user")->first();
        $comment -> setAttribute("added_at" , $comment -> created_at -> diffForHumans() );
        return response() -> json( $comment );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment-> delete();
        return response() -> json([
            "status" => "deleted"
        ]);
    }
}
