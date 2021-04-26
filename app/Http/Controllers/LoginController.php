<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    //
    public function index()
    {
        $login = Auth::user();
        if($login)
        {
            if(Auth::user()->role == 'admin')
            {
                return redirect('dashboard');
            }
            elseif(Auth::user()->role == 'pengunjung' || Auth::user()->role == 'peserta')
            {
                return redirect('beranda');
            }
            else
            {
                Auth::logout();
                return redirect('/');
            }
        }
        else
        {
            return view('auth.login');
        }
    }
}
