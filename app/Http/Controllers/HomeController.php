<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }
    public function profil()
    {
        return view('admin.profil');
    }
    public function profilUpdate(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        // echo $input['name'];
        // echo $input['email'];
        // echo $input['password'];
        // exit;
        $cekemail = User::where('email', $input['email'])->where('id', '!=', $user->id)->get();
        if($cekemail->count() == 0)
        {
            if($input['password'] == '')
            {
                $input['password'] = $user->password;
            }
            else
            {
                $input['password'] = hash::make($input['password']);
            }
            $user->update($input);
            $user->save();
            return redirect('profils')->with('success', 'data profil berhasil diupdate');   
        }
        else
        {
            return redirect('profils')->with('fail', 'data profil gagal diupdate, email baru telah digunakan');
        }
    }
}
