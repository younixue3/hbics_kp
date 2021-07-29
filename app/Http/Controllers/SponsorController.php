<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sponsor;
use App\Event;

class SponsorController extends Controller
{
    public function index($event_id)
    {
        //
        $event = Event::findOrFail($event_id);
        return view('admin.sponsor.index', compact('event'));
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
        return view('admin.sponsor.create', compact('event')); 
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
        $input['event_id'] = $event->id;
        $validatedData = $request->validate([
            'logo' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',
            'keterangan' => 'required',
            ]);
        if($request->has('logo')){
            $logo = $input['logo'];
            $logoname = 'sponsors-'.md5(\Carbon\Carbon::now().$logo->getClientOriginalName()).'.'.$logo->getClientOriginalExtension();
            $logo->move('uploads/sponsors', $logoname);
            $input['logo'] = $logoname;
        }
        else{
            $input['logo'] = 'nopict.jpg';
        }
        $data = Sponsor::create($input);
        if($data)
        {
            return redirect('sponsors/'.$event->id)->with('success', 'Data berhasil diupload ke server');
        }
        else
        {
            return redirect('sponsors/'.$event->id)->with('fail', 'Data gagal diupload ke server');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($event_id, $id)
    {
        //
        $data = Sponsor::findOrFail($id);
        return view('admin.sponsor.view', compact('data'));
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
        $data = Sponsor::findOrFail($id);
        return view('admin.sponsor.edit', compact('data'));
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
            'logo' => 'mimes:jpeg,bmp,png,jpg|max:2000',
            'keterangan' => 'required',
            ]);
        $find = Sponsor::findOrFail($id);
        if($request->has('logo')){
            $this->deletelogo($find->logo);
            $logo = $input['logo'];
            $logoname = 'sponsors-'.md5(\Carbon\Carbon::now().$logo->getClientOriginalName()).'.'.$logo->getClientOriginalExtension();
            $logo->move('uploads/sponsors', $logoname);
            $input['logo'] = $logoname;        }
        else{
            $input['logo'] = $find->logo;
        }
        $find->update($input);
        $find->save();
        if($find)
        {
            return redirect('sponsors/'.$event_id)->with('success', 'Data berhasil diupdate di server');
        }
        else
        {
            return redirect('sponsors/'.$event_id)->with('fail', 'Data gagal diupdate di server');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($event_id, $id)
    {
        //
        $sponsor = Sponsor::findOrFail($id);
        if($sponsor->logo != '')
        {
            $this->deletelogo($sponsor->logo);
        }
        $sponsor->delete();
        return redirect('sponsors/'.$event_id)->with('success', 'Data berhasil dihapus di server');
    }
    public function deletelogo($logoname){
        // path folder
        $path = 'uploads/sponsors/';
        // delete gambar bisa jadikan if true or false misal false kasih konidisi etc
        if(\File::delete($path.$logoname)){
            return true;
        }
    }
}
