<?php

namespace App\Http\Controllers\Admin;

use App\Models\Messege;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messeges = Messege::orderBy("id","desc")->paginate(50);
        foreach( $messeges as $messege ){
            $messege -> setAttribute("added_at" , $messege -> created_at -> diffForHumans() ); 
        }
        return response()->json($messeges);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Messege  $messege
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $messege = Messege::where("id" , $id ) -> first();
        $messege -> setAttribute("added_at" , $messege -> created_at -> diffForHumans() );
        return response() -> json( $messege );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Messege  $messege
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $messege = Messege::find($id);
        $messege-> delete();
        return response() -> json([
            "status" => "deleted"
        ]);
    }
}
