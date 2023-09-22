<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

   public function Dashboard() {

    $data['header_tittle'] = 'dashboard';
    if (Auth::user() ->user_type == 1)
    {
        return view('admin.dashboard', $data);
    }
    else if(Auth::user()-> user_type == 2)
    {
        return view('teacher.dashboard', $data);
    }
    else if(Auth::user()-> user_type == 3)
    {
        return view('student.dashboard', $data);
    }
    else if(Auth::user()-> user_type == 4)
    {
        return view('parent.dashboard', $data);
    }
}
}
