<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(){
        //$courses = Course::all();
        return view('home.index');
    }

    public function redirect()
    {
        $role=Auth::user()->role;
        if($role=='1'){
            return view('admin.index');
        }
        if($role=='2'){
            return view('instructor.index');
        }
        else{
            return view('student.index');
        }
    }
}
