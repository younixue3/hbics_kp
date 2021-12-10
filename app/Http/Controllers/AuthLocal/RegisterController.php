<?php

namespace App\Http\Controllers\AuthLocal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Provinsi;
use App\KotaKab;
use App\User;
use App\Event;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $provinsi = Provinsi::get();
        $acara = Event::where('status', 1)->get();
        $data = compact('provinsi', 'acara');
        return view('auth.register', $data);
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
            'event_id' => ['required'],
            'provinsi_id' => ['required'],
            'kota_kab_id' => ['required'],
            'password' => ['required', 'string'],
        ]);
        if ($request->kategori_peserta == 'kelompok') {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'jenjang' => $request->jenjang,
                'event_id' => intval($request->event_id),
                'provinsi_id' => intval($request->provinsi_id),
                'kota_kab_id' => intval($request->kota_kab_id),
                'password' => Hash::make($request->password),
            ]);
            return $user->id;
        } else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'jenjang' => $request->jenjang,
                'event_id' => intval($request->event_id),
                'provinsi_id' => intval($request->provinsi_id),
                'kota_kab_id' => intval($request->kota_kab_id),
                'password' => Hash::make($request->password),
            ]);
        }
    }
}
