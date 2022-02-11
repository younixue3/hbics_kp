<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GaleriTahun;
use App\Foto;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = GaleriTahun::get();
        return view('admin.galeri.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $validatedData = $request->validate([
            'folder' => 'required',
        ]);
        $data = GaleriTahun::create($input);
        if ($data) {
            return redirect('galeris')->with('success', 'Data berhasil diupload ke server');
        } else {
            return redirect('galeris')->with('fail', 'Data gagal diupload ke server');
        }
    }

    public function fotoStore(Request $request, $galeri_tahun)
    {
        $input = $request->all();
        $validatedData = $request->validate([
            'foto' => 'required|mimes:jpeg,bmp,png,jpg',
        ]);
        $tahun = GaleriTahun::findOrFail($galeri_tahun);
        $input['galeri_tahuns_id'] = $tahun->id;
        if ($request->has('foto')) {
            $foto = $input['foto'];
            $fotoname = 'galeri-' . md5(\Carbon\Carbon::now() . $foto->getClientOriginalName()) . '.' . $foto->getClientOriginalExtension();
            $foto->move('uploads/galeris', $fotoname);
            $input['foto'] = $fotoname;
        } else {
            $input['foto'] = 'nopict.jpg';
        }
        $data = Foto::create($input);
        if ($data) {
            return redirect('galeris/' . $tahun->id . '/edit')->with('success', 'Data berhasil diupload ke server');
        } else {
            return redirect('galeris/' . $tahun->id . '/edit')->with('fail', 'Data gagal diupload ke server');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = GaleriTahun::findOrFail($id);
        return view('admin.galeri.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = GaleriTahun::findOrFail($id);
        return view('admin.galeri.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = GaleriTahun::findOrFail($id);
        if ($data->fotos->count() == 0) {
            $data->delete();
            if ($data) {
                return redirect('galeris')->with('success', 'Data berhasil dihapus ke server');
            } else {
                return redirect('galeris')->with('fail', 'Data gagal dihapus ke server');
            }
        } else {
            return redirect('galeris')->with('fail', 'Data gagal dihapus ke server');
        }
    }

    public function fotoDestroy($id)
    {
        //
        $data = Foto::findOrFail($id);
        $galeri_id = $data->galeri_tahuns_id;
        $this->deletefoto($data->foto);
        $data->delete();
        if ($data) {
            return redirect('galeris/' . $galeri_id . '/edit')->with('success', 'Data berhasil dihapus ke server');
        } else {
            return redirect('galeris/' . $galeri_id . '/edit')->with('fail', 'Data gagal dihapus ke server');
        }
    }

    public function deletefoto($fotoname)
    {
        // path folder
        $path = 'uploads/galeris/';
        // delete gambar bisa jadikan if true or false misal false kasih konidisi etc
        if (\File::delete($path . $fotoname)) {
            return true;
        }
    }
}
