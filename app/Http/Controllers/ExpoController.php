<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Event;
use App\Post;
use App\Karya;

class ExpoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profil()
    {
        $user = Auth::user();
        $karya = $user->karya;
        $event = Event::where('status', 1)->latest()->first();
        // echo $karya->likers->count();
        // exit;
        return view('expo.profil', compact('user', 'event', 'karya'));
    }
    public function karyaUpdate(Request $request)
    {
        $input = $request->all();
        $validatedData = $request->validate([
            'foto_tim' => 'mimes:jpeg,bmp,png,jpg|max:2000',
            'foto_poster' => 'mimes:jpeg,bmp,png,jpg|max:2000',
            'proposal' => 'mimes:docx,doc,pdf|max:2000',
        ]);
        $user = Auth::user();
        $karya = Karya::where('user_id', $user->id)->latest()->first();
        // FOTO TIM
        if($request->has('foto_tim'))
        {
            if($karya->foto_tim != '')
            {
                $this->deletefoto($karya->foto_tim);
            }
            $foto_tim = $input['foto_tim'];
            $foto_timname = 'fotoTim-'.md5(\Carbon\Carbon::now().$foto_tim->getClientOriginalName()).'.'.$foto_tim->getClientOriginalExtension();
            $foto_tim->move('uploads/karyas', $foto_timname);
            $input['foto_tim'] = $foto_timname;
        }
        // FOTO POSTER
        if($request->has('foto_poster'))
        {
            if($karya->foto_poster != '')
            {
                $this->deletefoto($karya->foto_poster);
            }
            $foto_poster = $input['foto_poster'];
            $foto_postername = 'fotoPoster-'.md5(\Carbon\Carbon::now().$foto_poster->getClientOriginalName()).'.'.$foto_poster->getClientOriginalExtension();
            $foto_poster->move('uploads/karyas', $foto_postername);
            $input['foto_poster'] = $foto_postername;
        }
        // PROPOSAL
        if($request->has('proposal'))
        {
            if($karya->proposal != '')
            {
                $this->deletefoto($karya->proposal);
            }
            $proposal = $input['proposal'];
            $proposalname = 'proposal-'.md5(\Carbon\Carbon::now().$proposal->getClientOriginalName()).'.'.$proposal->getClientOriginalExtension();
            $proposal->move('uploads/karyas', $proposalname);
            $input['proposal'] = $proposalname;
        }
        // echo $input['nama'];
        // echo $karya;
        // exit;
        $karya->update($input);
        $karya->save();
        if($karya)
        {
            return redirect('profil')->with('success', 'Data berhasil diupdate di server');
        }
        else
        {
            return redirect('profil')->with('fail', 'Data gagal diupdate di server');
        }
    }
    public function deletefoto($fotoname){
        // path folder
        $path = 'uploads/karyas/';
        // delete gambar bisa jadikan if true or false misal false kasih konidisi etc
        if(\File::delete($path.$fotoname)){
            return true;
        }
    }
}
