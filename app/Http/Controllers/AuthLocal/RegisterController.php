<?php

namespace App\Http\Controllers\AuthLocal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Provinsi;
use App\KotaKab;
use App\User;
use App\AnggotaKelompok;
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
//        dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'provinsi' => ['required'],
            'kota' => ['required'],
            'password' => ['required', 'string', 'confirmed'],
        ]);
        if ($request->kategori_peserta == 'kelompok') {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'provinsi_id' => intval($request->provinsi),
                'kota_kab_id' => intval($request->kota),
                'password' => Hash::make($request->password),
            ]);
            dd($user->id);
            AnggotaKelompok::create([

            ]);
        } else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'provinsi_id' => intval($request->provinsi),
                'kota_kab_id' => intval($request->kota),
                'password' => Hash::make($request->password),
            ]);
        }
//
        return redirect('/');
    }
}
