<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AnggotaKelompok;

class AnggotaKelompokController extends Controller
{
    public function index(Request $request)
    {
        foreach ($request->data['anggota'] as $key => $value) {
            AnggotaKelompok::create([
                'name' => $value['name'],
                'email' => $value['email'],
                'kelompok_id' => intval($request->data['kelompok'])
            ]);
        }
    }
}
