<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DataPanitiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->cari != null) {
            $datas = User::where('email', 'like', '%' . $request->cari)->orWhere('name', 'like', '%' . $request->cari . '%')->where('role', 'admin')->paginate(20);
        } else {
            $datas = User::where('role', 'admin')->paginate(20);
        }
        $data = Compact('datas');
        return view('admin.panitia.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show_panitia($id)
    {
        $data = User::where('role', 'admin')->findOrFail($id);
        $datas = compact('data');
        return view('admin.panitia.edit', $datas);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update_panitia(Request $request, $id)
    {
        $data = User::where('role', 'admin')->findOrFail($id);
        $data->update(['name' => $request->name, 'email' => $request->email]);
        $data->save();
        return redirect('panitia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete_panitia($id)
    {
        $data = User::where('role', 'admin')->findOrFail($id);
        $data->delete();
        return redirect('panitia');
    }

    public function change_role_panitia(Request $request, $id)
    {
        $data = User::where('role', 'admin')->findOrFail($id);
        $data->update(['role' => 'pengunjung']);
        $data->save();
        return redirect('panitia');
    }
}
