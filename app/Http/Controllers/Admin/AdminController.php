<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class AdminController extends Controller
{
    public function index()
    {
        /*========== Site Name ============*/
        $setting = Setting::find(1);
        $site_name = $setting -> site_name;
        
        return view('admin' , compact('site_name') );
    }
}
