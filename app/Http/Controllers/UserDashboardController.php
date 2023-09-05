<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $title = "Dashboard User";
        return view('user.dashboard',compact('title'));
    }
}
