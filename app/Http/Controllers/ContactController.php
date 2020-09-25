<?php

namespace App\Http\Controllers;

use App\Models\Messege;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

     public function store(Request $request){
          
          $rules = [
               "name"    =>  "required | string | min:4 | max:50" ,
               "phone"   =>  "required | numeric | digits_between:8,50 " ,
               "email"   =>  "required | email | min:8 | max:50 ",
               "messege" =>  "required | min:28 | max:1000 " ,
          ];

          $validator = Validator::make(  $request->all() , $rules  ); 

          if( $validator -> fails() ) { 
          
               return response() -> json([
                    "status" => "error",
                    "errors" => $validator->errors()  , // return errors validator in array 
                    "msg"    => "validation error"
               ]);
          
          }else{

               Messege::create([  
                    'name'   => $request->name ,  
                    'phone'  => $request->phone ,  
                    'email'  => $request->email ,  
                    'body'   => $request->messege ,  
               ]);

               return response() -> json([
                    "status" => "success",
                    "msg"    => "messeges added successfully"
               ]);       
          }

     }

}
