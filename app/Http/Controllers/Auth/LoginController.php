<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {
        if(Auth::User()->role == 'admin')
        {
            return 'dashboard';
        }
        else
        {
            return 'beranda';
        }
    }
    // public function redirectTo(){

    //     // User role
    //     $role = Auth::user()->role; 
    
    //     // Check user role
    //     if ($role == 'admin') 
    //     {
    //         return redirect('profils');
    //     } 
    //     elseif ($role == 'peserta' || $role == 'juri' || $role == 'pengunjung')
    //     {
    //         return redirect('beranda');
    //     }
    //     else
    //     {
    //         return redirect('/');
    //     }
    // }
}
