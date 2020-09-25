<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{


     public function store(Request $request){
        
          $rules = [
               "body"    => " required | min:4 | max:1000  " ,
               "post_id" =>  "required | numeric " ,
          ];

          $validator = Validator::make(  $request->all() , $rules  ); 

          if( $validator -> fails() ) { 
          
               return response() -> json([
                    "status" => "error",
                    "errors" => $validator->errors()  , // return errors validator in array 
                    "msg"    => "validation error"
               ]);
          
          }else{

               Comment::create([  
                    'body'      => $request->body ,  
                    'user_id'   => $request -> user()-> id ,  // get auth user id from token
                    'post_id'   => $request->post_id , 
               ]);

               return response() -> json([
                    "status" => "success",
                    "msg"    => "comment add successfully"
               ]);       
          }
     }


}
