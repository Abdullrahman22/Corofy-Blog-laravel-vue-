<?php

namespace App\Http\Controllers\AuthAPI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Redirect;

class AdminAuthController extends Controller
{


     public function view(){
          return view('auth/adminLogin');
     }

     public function login(Request $request){
        
          $rules = [
               "email"   =>   "required | email | min:8 | max:50 ",
               "password" =>  "required | min:8 | max:50 " ,
          ];

          $validator = Validator::make(  $request->all() , $rules  ); 

          if( $validator -> fails() ) { 
               return redirect() -> back() ->withErrors($validator)->withInput();
          }

          if(   
               Auth::guard("admin") -> attempt([  // attempt ==> mean see it in tables
                    "email" => $request->email ,
                    "password" => $request->password
               ])  
          ){  
               return redirect() -> to("/admin/overview");
               // return response() -> json("goooooooood");
          }else{
               return redirect() -> back() ->withErrors( $validator->getMessageBag()->add('email', " your admin data ins't correct ") )->withInput();
          }

          
     }

}