<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts" ;
    protected $fillable = [ "title" , "slug" , "body" , "img" , "category_id" ] ;
    ############################## Relations ################################
    public function category(){
        return  $this -> belongsTo("App\Models\Category") ;  
    }
    public function comments(){
        return $this-> hasMany("App\Models\Comment" , "post_id" );
    }
}
