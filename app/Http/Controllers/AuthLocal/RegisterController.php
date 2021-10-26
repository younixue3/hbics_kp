<?php

namespace App\Http\Controllers\AuthLocal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Provinsi;
use App\KotaKab;

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
}
