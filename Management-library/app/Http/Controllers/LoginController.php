<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('/login');
        }
    }
    public function actionLogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if (Auth::attempt($data)) {
        } else {
            redirect('/login');
        }
        return redirect('/');
    }
    public function actionLogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
