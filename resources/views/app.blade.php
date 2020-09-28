@extends('layouts.webTemplate')

@section('webContent')

    <!----- Header Component ----->
    <header-component></header-component>


    <!-----Toggle Pages ------->
    <router-view></router-view> 


    <!---- Register Modals Components ----->
    <register-model></register-model>
    <login-model></login-model>


    <!----- Footer Component ----->
    <footer-component></footer-component>

@endsection