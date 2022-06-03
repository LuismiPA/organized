<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PagesController extends Controller
{
    //login
    public function login(){
        if(Auth::check() && Auth::user()->tipo=="admin"){
            return redirect()->route("admin.panel");
        }
        if (Auth::check() && Auth::user()->tipo == "propietario") {
            return redirect()->route("user.panel");
        }
        return view("auth.login");
    }
    //admin
    public function adminPage(){
        return view("admin.panel");
    }
    //user
    public function userPage()
    {
        return view("user.panel");
    }
}