<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Admin;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin');
    }

    public function getAdminInfo(){

        /*========== Admin Info ============*/
        $admin = Admin::get()->first();

        /*========== Site Name ============*/
        $site_name = Setting::find(1)->site_name;
        
        return response() ->json([ 
            'admin_info' => $admin,
            'site_name' => $site_name,
        ]);

    }
    
}
