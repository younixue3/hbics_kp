<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Event;
use App\Post;
use App\Karya;
use App\KaryaFoto;
use App\User;
use App\Komentar;

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
        if($user->role == 'admin' || $user->role == 'pengunjung')
        {
            abort(404);
        }
        $karya = $user->karya;
        $event = Event::where('status', 1)->latest()->first();
        // echo $karya->likers->count();
        // exit;
        return view('expo.profil', compact('user', 'event', 'karya'));
    }
    public function profilUpdate(Request $request)
    {
        //
        $input = $request->all();
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            ]);
        $user = User::findOrFail(Auth::user()->id);
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
            $user->password = $input['password'];
            $user->email = $input['email'];
            $user->name = $input['name'];
            $user->save();
            if($user)
            {
                return redirect('profil')->with('success', 'Data berhasil diupdate di server');
            }
            else
            {
                return redirect('profil')->with('fail', 'Data gagal diupdate di server');
            }
        }
        else
        {
            return redirect('profil')->with('fail', 'Data gagal diupdate di server, email telah terdaftar di akun lainnya');
        }
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
    public function karyaFoto(Request $request)
    {
        $input = $request->all();
        $validatedData = $request->validate([
            'foto' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',
        ]);
        $user = Auth::user();
        $karya = Karya::where('user_id', $user->id)->latest()->first();
        $foto = $input['foto'];
        $fotoname = 'foto-'.md5(\Carbon\Carbon::now().$foto->getClientOriginalName()).'.'.$foto->getClientOriginalExtension();
        $foto->move('uploads/karyafotos', $fotoname);
        $input['foto'] = $fotoname;
        $input['karya_id'] = $karya->id;
        $data = KaryaFoto::create($input);
        if($data)
        {
            return redirect('profil')->with('success', 'Foto berhasil diupload di server');
        }
        else
        {
            return redirect('profil')->with('fail', 'Foto gagal diupload di server');
        }
    }
    public function karyaFotoDelete($id)
    {
        $data = KaryaFoto::findOrFail($id);
        $this->deletekaryafoto($data->foto);
        $data->delete();
        if($data)
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
    public function deletekaryafoto($fotoname){
        // path folder
        $path = 'uploads/karyafotos/';
        // delete gambar bisa jadikan if true or false misal false kasih konidisi etc
        if(\File::delete($path.$fotoname)){
            return true;
        }
    }
    public function virtualexpo()
    {
        if (Auth::user()->role == 'admin') 
        {
            $jenjang = 'smp';
            $kategori = 'kriya';
            switch ($jenjang) {
                case 'smp':
                    $cjenjang = 'SMP/MTS';
                    break;
                case 'sma':
                    $cjenjang = 'SMA/SMK/MAN';
                    break;
            }
            switch ($kategori) {
                case 'kriya':
                    $ckategori = 'Kriya';
                    break;
                case 'fashion':
                    $ckategori = 'Fashion';
                    break;
                case 'food-and-baverage':
                    $ckategori = 'Food and Baverage';
                    break;
                case 'aplikasi-dan-game':
                    $ckategori = 'Aplikasi dan Game';
                    break;
                case 'desain-grafis':
                    $ckategori = 'Desain Grafis';
                    break;
            }
            $now = \Carbon\Carbon::now();
            $event = Event::where('status', 1)->latest()->first();
            $karyas = Karya::where('event_id', $event->id)->where('jenjang', $cjenjang)->where('kategori', $ckategori)->get();
            return view('expo.simulasi.expo-list', compact('event', 'karyas', 'jenjang', 'kategori', 'now'));
        } 
        else 
        {
            abort(404);
        }
    }
    public function expoJenjangKategori($jenjang, $kategori)
    {
        if (Auth::user()->role == 'admin') 
        {
            if($jenjang == 'smp' || $jenjang == 'sma')
            {
                if($kategori == 'desain-grafis' || $kategori == 'aplikasi-dan-game' || $kategori == 'food-and-baverage' || $kategori == 'fashion' || $kategori == 'kriya')
                {
                    switch ($jenjang) {
                        case 'smp':
                            $cjenjang = 'SMP/MTS';
                            break;
                        case 'sma':
                            $cjenjang = 'SMA/SMK/MAN';
                            break;
                    }
                    switch ($kategori) {
                        case 'kriya':
                            $ckategori = 'Kriya';
                            break;
                        case 'fashion':
                            $ckategori = 'Fashion';
                            break;
                        case 'food-and-baverage':
                            $ckategori = 'Food and Baverage';
                            break;
                        case 'aplikasi-dan-game':
                            $ckategori = 'Aplikasi dan Game';
                            break;
                        case 'desain-grafis':
                            $ckategori = 'Desain Grafis';
                            break;
                    }
                    $event = Event::where('status', 1)->latest()->first();
                    $now = \Carbon\Carbon::now();
                    $karyas = Karya::where('event_id', $event->id)->where('jenjang', $cjenjang)->where('kategori', $ckategori)->get();
                    return view('expo.simulasi.expo-list', compact('jenjang', 'kategori', 'karyas', 'now', 'event'));
                }
                else
                {
                    abort(404);
                }
            }
            else
            {
                abort(404);
            }
        }
        else
        {
            abort(404);
        }
    }
    public function expoDetailProduct($jenjang, $kategori, $id, $slug)
    {
        if (Auth::user()->role == 'admin') 
            {
            $data = Karya::findOrFail($id);
            $karyas = Karya::where('jenjang', $data->jenjang)->where('kategori', $data->kategori)->where('id', '!=', $id)->get();
            switch ($data->jenjang) {
                case 'SMP/MTS':
                    $jenjang = 'smp';
                    break;
                case 'SMA/SMK/MAN':
                    $jenjang = 'sma';
                    break;
            }
            switch ($data->kategori) {
                case 'Kriya':
                    $kategori = 'kriya';
                    break;
                case 'Fashion':
                    $kategori = 'fashion';
                    break;
                case 'Food and Baverage':
                    $kategori = 'food-and-baverage';
                    break;
                case 'Aplikasi dan Game':
                    $kategori = 'aplikasi-dan-game';
                    break;
                case 'Desain Grafis':
                    $kategori = 'desain-grafis';
                    break;
            }
            $statuslike = Komentar::where('user_id', Auth::user()->id)->where('karya_id', $id)->where('liked', 1)->latest()->first();
            return view('expo.simulasi.expo-detail', compact('data', 'jenjang', 'kategori', 'karyas', 'statuslike'));
        }
        else
        {
            abort(404);
        }
    }
}