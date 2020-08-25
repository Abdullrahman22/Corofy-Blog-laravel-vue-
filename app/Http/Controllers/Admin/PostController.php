<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy("id","desc")-> withCount('comments')-> with("category") -> paginate(25);
        foreach( $posts as $post ){
            $post -> setAttribute("added_at" , $post -> created_at -> diffForHumans() ); 
        }
        return response()->json($posts);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*====== Form Validation =====*/
        $rules = [
            "title"       => " required | min:4 | max:28  " ,
            "category_id" => " required | numeric " ,
            "body"        => " required | min:200 | max:4500  " ,
        ];
        $validator = Validator::make(  $request->all() , $rules  ); 
        if( $validator -> fails()) {  
            return response() -> json([
                "status" => "error",
                "errors" => $validator->errors()  // return errors validator in array 
            ]); 
        }

        
        /*===== check request null ======*/
        if ( $request -> img == null  ) {
            return response() -> json([
                "status"   =>  'error' ,
                "errors"   =>  [  'img' => ["You must upload post image."] ],
            ]);
        }
            
        /*===== check img extention ======*/
        //  $request -> img  ==> data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABQAAAA+4CAYAAABKDTGh...........
        $exploded = explode("," ,  $request -> img); // part form ',' convert to array // $exploded[0] ==> data:image/png;base64
        $decoded = base64_decode($exploded[1]);  // iVBORw0KGgoAAAANSUhEUgAABQAAAA+4CAYAAABKDTGh...........
        if( str_contains( $exploded[0] , "jpeg" ) || str_contains( $exploded[0] , "jpg" ) ) {
            $extention = "jpg";
        }elseif( str_contains( $exploded[0] , "png" ) ){
            $extention = "png";
        }else{
            return response() -> json([
                "status"   =>  'error' ,
                "errors"   =>  [  'img' => ["You must upload only images."] ] ,
            ]);
        }


        /*====== Upload img =====*/

        $fileName = time() . "." . $extention;
        $path = 'images/posts' . '/' . $fileName;
        file_put_contents( $path , $decoded);
        

        /*====== Save in DB =====*/
        // vars 
        $title = $request -> title;
        $slug = str_replace(" " , "-" , $title);
        
        Post::create([  
            'title'       => $title ,  
            'slug'        => $slug ,  
            'img'         => $fileName , 
            'category_id' => $request -> category_id , 
            'body'        => $request -> body , 
        ]);

        return response() -> json([
            "status" => "saved"
        ]);       
    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
    */
    public function show( $id )   // if is not $id not add Post Model in params
    {

        $post = Post::where("id" , $id )->with(["category", "comments"]) -> withCount('comments') -> first();
        $post -> setAttribute("added_at" , $post -> created_at -> diffForHumans() );

        $comments = $post -> comments;
        foreach( $comments as $comment ){
            $comment -> setAttribute("user" , $comment -> user );
            $comment -> setAttribute("added_at" , $post -> created_at -> diffForHumans() );
        }

        return response() -> json( $post );

    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
    */
    public function update(Request $request , $id )
    {

            
        /*====== Form Validation =====*/
        $rules = [
            "title"       => " required | min:4 | max:28  " ,
            "category_id" => " required | numeric " ,
            "body"        => " required | min:200 | max:4500  " ,
        ];
        $validator = Validator::make(  $request->all() , $rules  ); 
        if( $validator -> fails()) {  
            return response() -> json([
                "status" => "error",
                "errors" => $validator->errors()  // return errors validator in array 
            ]);
        }
   



        if( str_contains( $request -> img , "base64" ) ){   // check if there new img uploaded
            //  $request -> img  ==> data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABQAAAA+4CAYAAABKDTGh...........
            $exploded = explode("," ,  $request -> img); // part form ',' convert to array // $exploded[0] ==> data:image/png;base64
            $decoded = base64_decode($exploded[1]);  // iVBORw0KGgoAAAANSUhEUgAABQAAAA+4CAYAAABKDTGh...........
            if( str_contains( $exploded[0] , "jpeg" ) || str_contains( $exploded[0] , "jpg" ) ) {
                $extention = "jpg";
            }elseif( str_contains( $exploded[0] , "png" ) ){
                $extention = "png";
            }else{
                return response() -> json([
                    "status"   =>  'error' ,
                    "errors"   =>  [  'img' => ["You must upload only images."] ] ,
                ]);
            }

            /*====== Upload img =====*/
            $fileName = time() . "." . $extention;
            $path = 'images/posts' . '/' . $fileName;
            file_put_contents( $path , $decoded);
            
        }else{
            $fileName = $request-> img;
        }
    
        // Get Post By $id
        $post = Post::where('id', $id ) -> first(); // OR where('id', $request-> id ) 
        // vars 
        $title = $request -> title;
        $slug = str_replace(" " , "-" , $title);

        /*====== Update DB =====*/
        $post -> update([  
            'title'       => $title ,  
            'slug'        => $slug ,  
            'img'         => $fileName , 
            'category_id' => $request -> category_id , 
            'body'        => $request -> body , 
        ]);
        /*========= response Status Updated ===========*/
        return response() -> json([
            "status" => "updated"
        ]);    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post-> delete();
        return response() -> json([
            "status" => "deleted"
        ]);
    }
}