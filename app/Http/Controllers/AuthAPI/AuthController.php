<?php

namespace App\Http\Controllers\AuthAPI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class AuthController extends Controller
{
    
    public function register(Request $request)
    {
        // Register Rules 
        $rules = [
            'name' => 'required|string|min:6|max:50',
            'email' => 'required|string|email|max:55|unique:users',
            'password' => 'required|min:8|confirmed',
        ];
        // Validate Register
        $validator = Validator::make( $request->all() , $rules  ); 
        // Error Response If Validate Fail
        if( $validator -> fails()) {  
            return response() -> json([
                "status" => "error",
                "msg" => "validation error",
                "errors" => $validator->errors()  
            ], 422); 
        }
        // Customize Requests
        $request['password'] = Hash::make($request['password']); 
        $request['remember_token'] = Str::random(10);
        // Save User In DB
        $user = User::create( $request->toArray() );
        // Genrate Token For New User
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        // Success Response
        return response()-> json([
            'status' => 'success' ,
            "msg" => "register successfully",
            'token' => $token,
        ], 200);

    }

    public function login(Request $request)
    {
        // Login Rules 
        $rules = [
            'email' => 'required|string|email|max:55',
            'password' => 'required|min:8',
        ];
        // Validate Login
        $validator = Validator::make( $request->all() , $rules  ); 
        // Error Response If Validate Fail
        if( $validator -> fails()) {  
            return response() -> json([
                "status" => "error",
                "msg" => "validation error",
                "errors" => $validator->errors()  
            ], 422 ); 
        }
        // Check if User Email Exist
        $user = User::where('email', $request->email)->first();
        if ($user) {
            // Check if Same Password
            if (Hash::check( $request->password , $user->password )) {
                // Genrate Token For Login User
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                return response()-> json([
                    'status' => 'success' ,
                    "msg" => "login successfully",
                    'token' => $token
                ], 200);
            } else {
                return response() -> json([
                    "status" => "error",
                    "msg" => "validation error",
                    "errors" => $validator->getMessageBag()->add('password', "password isn't correct")
                ], 422 );
            }
        }else{
            // if Email Not Exist
            return response() -> json([
                "status" => "error",
                "msg" => "validation error",
                "errors" => $validator->getMessageBag()->add('email', "user isn't exist")
            ], 422 );
        }

    }

    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }

}