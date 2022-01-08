<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Event;
use App\Timeline;

class TimelineController extends Controller
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
        return view('admin.timeline.index', compact('event'));
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
        return view('admin.timeline.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $event_id)
    {
        //
        $event = Event::findOrFail($event_id);
        $input = $request->all();
        $validatedData = $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'kode' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);
        if ($input['tanggal_mulai'] > $input['tanggal_selesai']) {
            return redirect('timelines/' . $event->id)->with('fail', 'Data gagal diupload ke server, tanggal mulai tidak boleh lebih dari tanggal selesai');
        } else {
            $input['event_id'] = $event->id;
            $data = Timeline::create($input);
            if ($data) {
                return redirect('timelines/' . $event->id)->with('success', 'Data berhasil diupload ke server');
            } else {
                return redirect('timelines/' . $event->id)->with('fail', 'Data gagal diupload ke server');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($event_id, $id)
    {
        //
        $data = Timeline::findOrFail($id);
        return view('admin.timeline.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($event_id, $id)
    {
        //
        $data = Timeline::findOrFail($id);
        return view('admin.timeline.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $event_id, $id)
    {
        //
        $input = $request->all();
        $validatedData = $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'kode' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);
        $data = Timeline::findOrFail($id);
        $event = Event::findOrFail($event_id);
        if ($input['tanggal_mulai'] > $input['tanggal_selesai']) {
            return redirect('timelines/' . $event->id)->with('fail', 'Data gagal diupload ke server, tanggal mulai tidak boleh lebih dari tanggal selesai');
        } else {
            $input['event_id'] = $event->id;
            $data->update($input);
            $data->save();
            if ($data) {
                return redirect('timelines/' . $event->id)->with('success', 'Data berhasil diupload ke server');
            } else {
                return redirect('timelines/' . $event->id)->with('fail', 'Data gagal diupload ke server');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($event_id, $id)
    {
        //
        $timeline = Timeline::findOrFail($id);
        $event = Event::findOrFail($event_id);
        $timeline->delete();
        return redirect('timelines/' . $event->id)->with('success', 'Data berhasil dihapus di server');
    }
}
