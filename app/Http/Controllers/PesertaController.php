<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Event;
use App\Karya;
use App\User;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function visitor(Request $request)
    {
        if ($request->cari != null) {
            $datas = User::where('email', 'like', '%'.$request->cari)->orWhere('name', 'like', '%'.$request->cari.'%')->where('role', 'pengunjung')->paginate(20);
        } else {
            $datas = User::where('role', 'pengunjung')->paginate(20);
        }
        $data = compact('datas');
        return view('admin.visitor.index', $data);
    }

    public function show_visitor ($id)
    {
        $data = User::where('role', 'pengunjung')->findOrFail($id);
        $datas = compact('data');
        return view('admin.visitor.edit', $datas);
    }

    public function update_visitor(Request $request, $id)
    {
        $data = User::where('role', 'pengunjung')->findOrFail($id);
        $data->update(['name' => $request->name, 'email' => $request->email]);
        $data->save();
        return redirect('visitors');
    }

    public function change_role_visitor(Request $request, $id)
    {
        $data = User::where('role', 'pengunjung')->findOrFail($id);
        $data->update(['role' => 'admin']);
        $data->save();
        return redirect('visitors');
    }

    public function delete_visitor($id)
    {
        $data = User::where('role', 'pengunjung')->findOrFail($id);
        $data->delete();
        return redirect('visitors');
    }

    public function index($event_id)
    {
        $event = Event::findOrFail($event_id);
        $karyas = User::where('role', 'peserta')->where('event_id', $event_id)->get();
        $jumlah = $karyas->count();
        return view('admin.peserta.index', compact('event', 'karyas', 'jumlah'));
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
        return view('admin.peserta.create', compact('event'));
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
        $input = $request->all();
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
            ]);
        $input['password'] = Hash::make($input['password']);
        $input['role'] = 'peserta';
        $event = Event::findOrFail($event_id);
        $data = User::create($input);
        if($data)
        {
            $karya = new Karya();
            $karya->event_id = $event->id;
            $karya->user_id = $data->id;
            $karya->save();
            if($karya)
            {
                return redirect('pesertas/'.$event->id)->with('success', 'Data berhasil diupload ke server');
            }
            else
            {
                return redirect('pesertas/'.$event->id)->with('fail', 'Data gagal diupload ke server');
            }
        }
        else
        {
            return redirect('pesertas/'.$event->id)->with('fail', 'Data gagal diupload ke server');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($event_id, $user_id)
    {
        //
        $data = User::findOrFail($user_id);
        return view('admin.peserta.view', compact('data', 'event_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($event_id, $user_id)
    {
        //
        $data = User::findOrFail($user_id);
        return view('admin.peserta.edit', compact('data', 'event_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $event_id, $user_id)
    {
        //
        $input = $request->all();
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            ]);
        $user = User::findOrFail($user_id);
        $cekemail = User::where('email', $input['email'])->where('id', '!=' ,$user->id)->get();
        if($cekemail->count() == 0)
        {
            if($input['password'] == '')
            {
                $input['password'] = $user->password;
            }
            else
            {
                $input['password'] = Hash::make($input['password']);
            }
            $user->update($input);
            $user->save();
            if($user)
            {
                return redirect('pesertas/'.$event_id)->with('success', 'Data berhasil diupdate di server');
            }
            else
            {
                return redirect('pesertas/'.$event_id)->with('fail', 'Data gagal diupdate di server');
            }
        }
        else
        {
            return redirect('pesertas/'.$event_id)->with('fail', 'Data gagal diupdate di server, email telah terdaftar di akun lainnya');
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
        $event = Event::findOrFail($event_id);
        $user = User::findOrFail($id);
        $karya = Karya::where('user_id', $user->id)->latest()->first();
        if($karya->foto_tim != '')
        {
            $this->deletefoto($karya->foto_tim);
        }
        if($karya->foto_poster != '')
        {
            $this->deletefoto($karya->foto_poster);
        }
        if($karya->proposal != '')
        {
            $this->deletefoto($karya->proposal);
        }
        foreach($karya->fotos as $foto)
        {
            $this->deletekaryafoto($foto->foto);
            $foto->delete();
        }
        $karya->delete();
        $user->delete();
        return redirect('pesertas/'.$event->id)->with('success', 'Data berhasil dihapus di server');
    }
    public function deletefoto($fotoname){
        // path folder
        $path = 'uploads/karyas/';
        // delete gambar bisa jadikan if true or false misal false kasih konidisi etc
        if(\File::delete($path.$fotoname)){
            return true;
        }
    }
    public function deletekaryafoto($fotoname){
        // path folder
        $path = 'uploads/karyafotos/';
        // delete gambar bisa jadikan if true or false misal false kasih konidisi etc
        if(\File::delete($path.$fotoname)){
            return true;
        }
    }
}
