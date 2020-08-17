<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function get_All_Categories(){
        $categories =  Category::whereHas("posts")->get();
        foreach( $categories as $category ){
            $category -> setAttribute("posts_count" , $category -> posts -> count() );  
        }
        return response()-> json( $categories );
    }

    public function get_Category_Posts($slug){
        $category = Category::where("slug" , $slug) -> first();
        $posts = Post::where("category_id" , $category-> id ) -> orderBy('id' , "desc") ->  paginate(10);
        
        foreach( $posts as $post ){
            $post -> setAttribute("added_at" , $post -> created_at -> diffForHumans() ); 
            $post -> setAttribute("comments_count" , $post -> comments -> count() ); 
        } 

        return response()-> json( $posts );
    }

}
