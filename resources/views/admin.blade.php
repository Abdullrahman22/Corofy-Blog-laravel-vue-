@extends('layouts.adminTemplate')

@section('adminContent')

    <!----- Menu Sidebar ------->
    <menu-sidebar></menu-sidebar>

    <!----- Menu Mobile ------->
    <menu-mobile></menu-mobile>

    <div class="dashboard-page">
            
        <!-- PAGE CONTAINER-->
        <div class="page-container">

            <!-- topbar -->
            <topbar></topbar>

            <!-----Toggle Pages ------->
            <router-view></router-view> 
        </div>

    </div>
    
@endsection