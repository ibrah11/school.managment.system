<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;

use Str;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     */
    public function AuthLogin(Request $request): RedirectResponse
    {
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
        {
            if(Auth::user()->user_type == 1)
        {
            return redirect('admin/dashboard');
        }
        elseif(Auth::user()->user_type == 2)
        {
            return redirect('teacher/dashboard');
        }
        elseif(Auth::user()->user_type == 3)
        {
            return redirect('student/dashboard');
        }
        elseif(Auth::user()->user_type == 4)
        {
            return redirect('parent/dashboard');
        }
        }

        /*if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin/dashboard');

        }*/

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function Login()
    {
        return view('Auth.login');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();

        return back();
    }

    public function forgotpassword(){
        return view('Auth.forgot');
    }

    public function PostForgotPassword(Request $request)
    {
        $User = user::getEmailSingle($request->email);
        if (!empty($User))
        {
            $User->remember_token = user::random(30);
            $User->saved();

            Mail::to($User->email)->send(new ForgotPasswordMail($User));

            return redirect()->back()->with('Success', 'please check your email and reset your password');
        }
        else
        {
            return redirect()->back()->with('error', 'Email not found in the system');
        }
    }

    public function RegisterToken(Request $request)
    {
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        $response = [
            'success' => true,
            'code' => 201,
            'message' => 'User log in successfully',
            'result' => "success"
        ];

        return response($response, 201);

    }
}
