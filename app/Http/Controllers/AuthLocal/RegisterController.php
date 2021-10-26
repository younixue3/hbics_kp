<?php

namespace App\Http\Controllers\AuthLocal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Provinsi;
use App\KotaKab;
use App\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $provinsi = Provinsi::get();
        $data = compact('provinsi');
        return view('auth.register', compact('provinsi'));
    }

    public function get_kota(Request $request)
    {
        $kota = KotaKab::get()->where('provinsi_id', $request->provinsi);
        return response()->json($kota);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'provinsi' => ['required'],
            'kota' => ['required'],
            'password' => ['required', 'string', 'confirmed'],
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/');
    }
}
