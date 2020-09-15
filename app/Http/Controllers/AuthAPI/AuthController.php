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

        $rules = [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:55|unique:users',
            'password' => 'required|min:8|confirmed',
        ];
        $validator = Validator::make( $request->all() , $rules  ); 
        if( $validator -> fails()) {  
            return response() -> json([
                "status" => "error",
                "errors" => $validator->errors()  // return errors validator in array 
            ], 422 ); 
        }

        $request['password'] = Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);
        $user = User::create($request->toArray());
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        $response = ['token' => $token];
        return response($response, 200);

    }

    public function login(Request $request)
    {

        $rules = [
            'email' => 'required|string|email|max:55',
            'password' => 'required|min:8',
        ];
        $validator = Validator::make( $request->all() , $rules  ); 
        if( $validator -> fails()) {  
            return response() -> json([
                "status" => "error",
                "errors" => $validator->errors()  // return errors validator in array 
            ], 422 ); 
        }

        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['token' => $token];
                return response($response, 200);
            } else {
                $response = ["message" => "Password mismatch"];
                return response($response, 422);
            }
        } else {
            $response = ["message" =>'User does not exist'];
            return response($response, 422);
        }

    }

    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }

}
