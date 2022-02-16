<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = Post::get();
        return view('admin.post.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validatedData = $request->validate([
            'foto' => 'required|mimes:jpeg,bmp,png,jpg',
            'judul' => 'required',
            'waktu' => 'required',
            'isi' => 'required',
        ]);
        if ($request->has('foto')) {
            $foto = $input['foto'];
            $fotoname = 'post-' . md5(\Carbon\Carbon::now() . $foto->getClientOriginalName()) . '.' . $foto->getClientOriginalExtension();
            $foto->move('uploads/posts', $fotoname);
            $input['foto'] = $fotoname;
        } else {
            $input['foto'] = 'nopict.jpg';
        }
        $data = Post::create($input);
        if ($data) {
            return redirect('posts')->with('success', 'Data berhasil diupload ke server');
        } else {
            return redirect('posts')->with('fail', 'Data gagal diupload ke server');
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
        $data = Post::findOrFail($id);
        return view('admin.post.view', compact('data'));
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
        $data = Post::findOrFail($id);
        return view('admin.post.edit', compact('data'));
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
        $input = $request->all();
        $validatedData = $request->validate([
            'foto' => 'mimes:jpeg,bmp,png,jpg|max:2000',
            'judul' => 'required',
            'waktu' => 'required',
            'isi' => 'required',
        ]);
        $find = Post::findOrFail($id);
        if ($request->has('foto')) {
            $this->deletefoto($find->foto);
            $foto = $input['foto'];
            $fotoname = 'post-' . md5(\Carbon\Carbon::now() . $foto->getClientOriginalName()) . '.' . $foto->getClientOriginalExtension();
            $foto->move('uploads/posts', $fotoname);
            $input['foto'] = $fotoname;
        } else {
            $input['foto'] = $find->foto;
        }
        $find->update($input);
        $find->save();
        if ($find) {
            return redirect('posts')->with('success', 'Data berhasil diupdate di server');
        } else {
            return redirect('posts')->with('fail', 'Data gagal diupdate di server');
        }
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
        $data = Post::findOrFail($id);
        $this->deletefoto($data->foto);
        $data->delete();
        return redirect('posts')->with('success', 'Data berhasil dihapus di server');
    }

    public function deletefoto($logoname)
    {
        // path folder
        $path = 'uploads/posts/';
        // delete gambar bisa jadikan if true or false misal false kasih konidisi etc
        if (\File::delete($path . $logoname)) {
            return true;
        }
    }
}
