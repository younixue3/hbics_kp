<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Event;
use App\Juri;

class JuriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($event_id)
    {
        //
        $event = Event::findOrFail($event_id);
        return view('admin.juri.index', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($event_id)
    {
        //
        $event = Event::findOrFail($event_id);
        return view('admin.juri.create', compact('event')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $event_id)
    {
        //
        $event = Event::findOrFail($event_id);
        $input = $request->all();
        $validatedData = $request->validate([
            'foto' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',
            'nama' => 'required',
            'url_profil' => 'required',
            'quote' => 'required',
            ]);
        if($request->has('foto')){
            $foto = $input['foto'];
            $fotoname = 'juri-'.md5(\Carbon\Carbon::now().$foto->getClientOriginalName()).'.'.$foto->getClientOriginalExtension();
            $foto->move('uploads/juris', $fotoname);
            $input['foto'] = $fotoname;
        }
        else{
            $input['foto'] = 'nopict.jpg';
        }
        $input['event_id'] = $event->id;
        $data = Juri::create($input);
        if($data)
        {
            return redirect('juris/'.$event->id)->with('success', 'Data berhasil diupload ke server');
        }
        else
        {
            return redirect('juris/'.$event->id)->with('fail', 'Data gagal diupload ke server');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($event_id, $id)
    {
        //
        $data = Juri::findOrFail($id);
        return view('admin.juri.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $event_id, $id)
    {
        //
        $input = $request->all();
        $validatedData = $request->validate([
            'foto' => 'mimes:jpeg,bmp,png,jpg|max:2000',
            'nama' => 'required',
            'url_profil' => 'required',
            'quote' => 'required',
            ]);
        $find = Juri::findOrFail($id);
        if($request->has('foto')){
            $this->deletefoto($find->foto);
            $foto = $input['foto'];
            $fotoname = 'juri-'.md5(\Carbon\Carbon::now().$foto->getClientOriginalName()).'.'.$foto->getClientOriginalExtension();
            $foto->move('uploads/juris', $fotoname);
            $input['foto'] = $fotoname;        }
        else{
            $input['foto'] = $find->foto;
        }
        $find->update($input);
        $find->save();
        if($find)
        {
            return redirect('juris/'.$event_id)->with('success', 'Data berhasil diupdate di server');
        }
        else
        {
            return redirect('juris/'.$event_id)->with('fail', 'Data gagal diupdate di server');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function deletefoto($fotoname){
        // path folder
        $path = 'uploads/juris/';
        // delete gambar bisa jadikan if true or false misal false kasih konidisi etc
        if(\File::delete($path.$fotoname)){
            return true;
        }
    }
}
