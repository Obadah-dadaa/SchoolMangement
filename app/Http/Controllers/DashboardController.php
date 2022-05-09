<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {


        if(Auth::user()->hasRole('teacher'))
        {
            return view('Teachers.index');
        }
        elseif (Auth::user()->hasRole('parent'))
        {
            return view('parents.index');
        }
        elseif (Auth::user()->hasRole('system_administrator'))
        {
        return view('Admin.dashboard');
    }
}
    public function myprofile()
    {
        return view('profile');
    }
}
