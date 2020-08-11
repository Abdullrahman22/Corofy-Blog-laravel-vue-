<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Messege;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function site_Statistics(){
        $users    = User::get() ;
        $posts    = Post::get() ;
        $comments = Comment::get() ;
        $messeges = Messege::get() ;
        return response() -> json([ 
            "users_count"    => $users -> count(),
            "posts_count"    => $posts -> count(),
            "comments_count" => $comments -> count(),
            "messeges_count" => $messeges -> count(),
        ]);
    }

    public function lasted_Comments(){
        $comments    = Comment::OrderBy('id', "desc") ->with("user") -> limit(5) -> get();
        foreach( $comments as $comment ){
            $comment -> setAttribute("added_at" , $comment -> created_at -> diffForHumans() ); 
        }
        return response() -> json( $comments ) ;
    }

    public function lasted_Messeges(){
        $messeges    = Messege::OrderBy('id', "desc") -> limit(5) -> get();
        foreach( $messeges as $messege ){
            $messege -> setAttribute("added_at" , $messege -> created_at -> diffForHumans() ); 
        }
        return response() -> json( $messeges ) ;
    }
    
}
