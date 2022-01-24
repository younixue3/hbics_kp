<?php

namespace App\Http\Controllers\AuthLocal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Provinsi;
use App\KotaKab;
use App\User;
use App\Event;
use App\KategoriLp;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $provinsi = Provinsi::get();
        $data = compact('provinsi');
        return view('auth.register', $data);
    }

    public function index_lp()
    {
        $provinsi = Provinsi::get();
        $kategori_lp = KategoriLp::get();
//        dd($kategori_lp);
        $data = compact('provinsi', 'kategori_lp');
        return view('auth.register_lp', $data);
    }

    public function index_peserta()
    {
        $event = Event::get();
        $provinsi = Provinsi::get();
//        dd($event);
        $data = compact('event', 'provinsi');
        return view('auth.register_peserta', $data);
    }

    public function get_kota(Request $request)
    {
        $kota = KotaKab::get()->where('provinsi_id', $request->provinsi);
        return response()->json($kota);
    }

    public function insert(Request $request)
    {
//        return response($request);
        if ($request->pengunjung) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'provinsi_id' => ['required'],
                'kota_kab_id' => ['required'],
                'password' => ['required', 'string'],
            ]);
        } else {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'no_hp' => ['required'],
                'provinsi_id' => ['required'],
                'kota_kab_id' => ['required'],
                'password' => ['required', 'string'],
            ]);
        }
        if ($request->event_id == 2) {
            if ($request->pengunjung) {
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'no_hp' => $request->no_hp,
                    'event_id' => intval($request->event_id),
                    'provinsi_id' => intval($request->provinsi_id),
                    'kota_kab_id' => intval($request->kota_kab_id),
                    'role' => 'pengunjung',
                    'password' => Hash::make($request->password),
                ]);
            } else {
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'no_hp' => $request->no_hp,
                    'jenjang' => $request->jenjang,
                    'event_id' => intval($request->event_id),
                    'kategori_peserta' => 'individu',
                    'kategori_lp' => $request->kategori_lp,
                    'provinsi_id' => intval($request->provinsi_id),
                    'kota_kab_id' => intval($request->kota_kab_id),
                    'password' => Hash::make($request->password),
                ]);
            }
        } else {
            if ($request->pengunjung) {
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'no_hp' => $request->no_hp,
                    'event_id' => intval($request->event_id),
                    'role' => 'pengunjung',
                    'provinsi_id' => intval($request->provinsi_id),
                    'kota_kab_id' => intval($request->kota_kab_id),
                    'password' => Hash::make($request->password),
                ]);
            } else {
                if ($request->kategori_peserta == 'kelompok') {
                    $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'no_hp' => $request->no_hp,
                        'jenjang' => $request->jenjang,
                        'event_id' => intval($request->event_id),
                        'kategori_peserta' => $request->kategori_peserta,
                        'provinsi_id' => intval($request->provinsi_id),
                        'kota_kab_id' => intval($request->kota_kab_id),
                        'password' => Hash::make($request->password),
                    ]);
                    return $user->id;
                } else {
                    User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'no_hp' => $request->no_hp,
                        'jenjang' => $request->jenjang,
                        'event_id' => intval($request->event_id),
                        'kategori_peserta' => 'individu',
                        'provinsi_id' => intval($request->provinsi_id),
                        'kota_kab_id' => intval($request->kota_kab_id),
                        'password' => Hash::make($request->password),
                    ]);
                }
            }
        }
    }
}
