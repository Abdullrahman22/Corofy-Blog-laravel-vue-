<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function getSiteInfo(){
        $setting = Setting::find(1);
        return response()->json($setting) ;
    }

    public function update(Request $request){

        /*====== Form Validation =====*/
        $rules = [
            "site_name"       => " required | min:4 | max:50 " ,
            "contact_email"   => " required | email | min:4 | max:50 " ,
            "address"         => " required | min:20 | max:200  " ,
        ];

        $validator = Validator::make(  $request->all() , $rules  ); 

        if( $validator -> fails()) {  
            return response() -> json([
                "status" => "error",
                "errors" => $validator->errors()  // return errors validator in array 
            ]); 
        }

        $setting = Setting::find(1);
        $setting -> update([
            "site_name"     => $request -> site_name , 
            "contact_email" => $request -> contact_email , 
            "address"       => $request -> address , 
        ]);

        return response() -> json([
            "status" => 'updated'
        ]);

    }

}
