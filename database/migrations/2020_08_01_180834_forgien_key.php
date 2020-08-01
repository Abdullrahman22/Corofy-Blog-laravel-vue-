<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForgienKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        #################  posts table ##################  
        Schema::table('posts', function (Blueprint $table) {
            /* =========== category_id ===============*/ 
            $table->foreign("category_id")
            ->references('id')
            ->on("categories")
            ->onDelete("cascade")       
            ->onUpdate("cascade");     
        });
        #################  comments table ##################
        Schema::table('comments', function (Blueprint $table) {
            /* =========== user_id ===============*/
            $table->foreign("user_id")
            ->references('id')
            ->on("users")
            ->onDelete("cascade")       
            ->onUpdate("cascade");  
            /* =========== post_id ===============*/ 
            $table->foreign("post_id")
            ->references('id')
            ->on("posts")
            ->onDelete("cascade")       
            ->onUpdate("cascade");     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
