<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datas = Event::paginate(10);
        return view('admin.event.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // masukkan semua request ke array input
        $input = $request->all();
        //validasi data yang masuk dulu
        $validatedData = $request->validate([
            'logo' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',
            'tagline' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
            ]);
        // check data foto ada atau gak
        if($request->has('logo')){
            // memanggil data file
            $logo = $input['logo'];
            // memberi nama file
            $logoname = 'logo-'.md5(\Carbon\Carbon::now().$logo->getClientOriginalName()).'.'.$logo->getClientOriginalExtension();
            // memindahkan file ke public/uploads
            $logo->move('uploads/events', $logoname);
            // memasukan nama file ke array input untuk di create 
            $input['logo'] = $logoname;
        }
        //kasih case aja kalo foto ga diupload
        else{
            $input['logo'] = 'nopict.jpg';
        }
        // create data
        $data = Event::create($input);
        // redirect
        if($data)
        {
            return redirect('events')->with('success', 'Data berhasil diupload ke server');
        }
        else
        {
            return redirect('events')->with('fail', 'Data gagal diupload ke server');
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
        $data = Event::findOrFail($id);
        return view('admin.event.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Event::findOrFail($id);
        return view('admin.event.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->all();
        $validatedData = $request->validate([
            'logo' => 'mimes:jpeg,bmp,png,jpg|max:2000',
            'tagline' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
            ]);
        $find = Event::findOrFail($id);
        if($request->has('logo')){
            $this->deletelogo($find->logo);
            $logo = $input['logo'];
            $logoname = 'logo-'.md5(\Carbon\Carbon::now().$logo->getClientOriginalName()).'.'.$logo->getClientOriginalExtension();
            $logo->move('uploads/events', $logoname);
            $input['logo'] = $logoname;        }
        else{
            $input['logo'] = $find->logo;
        }
        $find->update($input);
        $find->save();
        if($find)
        {
            return redirect('events')->with('success', 'Data berhasil diupdate di server');
        }
        else
        {
            return redirect('events')->with('fail', 'Data gagal diupdate di server');
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
    public function deletelogo($logoname){
        // path folder
        $path = 'uploads/events';
        // delete gambar bisa jadikan if true or false misal false kasih konidisi etc
        if(\File::delete($path.$logoname)){
            return true;
        }
    }
}
