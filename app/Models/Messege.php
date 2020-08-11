<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Messege extends Model
{
    protected $table = "messeges" ;
    protected $fillable = [ "name" , "phone" , "email" , "body" ] ;

}
