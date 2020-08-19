<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy("id","desc")->withCount('posts')->paginate(50);
        foreach( $categories as $category ){
            $category -> setAttribute("added_at" , $category -> created_at -> diffForHumans() ); 
        }
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            "title"    => " required | min:4 | max:28  " ,
        ];
        $validator = Validator::make(  $request->all() , $rules  ); 

        if( $validator -> fails()) { 
            
            return response() -> json([
                "status" => "error",
                "errors" => $validator->errors()  // return errors validator in array 
            ]);
            
        }else{
            // vars 
            $title = $request -> title;
            $slug = str_replace(" " , "-" , $title);
            Category::create([  
                'title'      => $title ,  
                'slug'       => $slug , 
            ]);

            return response() -> json([
                "status" => "saved"
            ]);       
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        
        $rules = [
            "title"    => " required | min:4 | max:28  " ,
        ];
        $validator = Validator::make(  $request->all() , $rules  ); 

        if( $validator -> fails()) { 
            
            return response() -> json([
                "status" => "error",
                "errors" => $validator->errors()  // return errors validator in array 
            ]);
            
        }

        $category = Category::find($id);
        
        // vars 
        $title = $request -> title;
        $slug = str_replace(" " , "-" , $title);

        
        $category-> update([
            'title'      => $title ,  
            'slug'       => $slug , 
        ]);

        return response() -> json([
            "status" => "updated"
        ]);    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category-> delete();
        return response() -> json([
            "status" => "deleted"
        ]); 
    }
}
