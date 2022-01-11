<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Event;
use App\Post;
use App\Karya;
use App\KaryaFoto;
use App\User;
use App\Komentar;
use Carbon\Carbon;
use App\KategoriLomba;
use App\KategoriLp;
use Illuminate\Support\Facades\Storage;

class ExpoController extends Controller
{
//    Another Public Function
    public function update_profil_tim(Request $request)
    {
//        dd($request);
        $user = User::findOrFail(Auth::user()->id);
//        dd($user);
        $filename = today()->format('Y-m-d') . rand('00000', '99999') . '.png';
        $user->desc = $request->desc;
        if ($request->foto_profile != null) {

            Storage::disk('upload')->putFileAs('foto_profil', $request->foto_profile, $filename);

            $user->foto_profile = $filename;


        }
        $user->save();
        return redirect('/profil');
    }

    public function insert_foto_karya(Request $request)
    {
//        dd($request->file('foto_karya'));
        $get_karya = Karya::where('user_id', Auth::user()->id)->first();

        if ($request->foto_karya != null) {
            foreach ($request->file('foto_karya') as $value) {
                $filename = today()->format('Y-m-d') . rand('00000', '99999') . '.png';
//                $foto_poster = today()->format('Y-m-d') . rand('00000', '99999') . '.png';
                Storage::disk('upload')->putFileAs('karyafotos', $value, $filename);

                $foto_karya = KaryaFoto::create([
                    'karya_id' => $get_karya->id,
                    'foto' => $filename
                ]);
            }
        }

        return redirect('/profil');
    }

    public function insert_karya(Request $request)
    {
        $get_karya = Karya::where('user_id', Auth::user()->id)->first();
        if ($get_karya == null) {
            $foto_poster = null;
            $proposal = null;
        } else {
            $foto_poster = $get_karya->foto_poster;
            $proposal = $get_karya->proposal;
        }
        if ($request->foto_poster != null) {
            $foto_poster = today()->format('Y-m-d') . rand('00000', '99999') . '.png';
            Storage::disk('upload')->putFileAs('foto_poster', $request->foto_poster, $foto_poster);
        }
        if ($request->proposal != null) {
            $proposal = today()->format('Y-m-d') . $request->proposal->GetClientOriginalName();
            Storage::disk('upload')->putFileAs('proposal', $request->proposal, $proposal);
        }
        $karya = Karya::updateOrCreate(
            ['user_id' => Auth::user()->id],
            [
                'nama' => $request->nama,
                'event_id' => Auth::user()->event_id,
                'kategori' => $request->kategori,
                'foto_poster' => $foto_poster,
                'proposal' => $proposal,
                'deskripsi' => $request->deskripsi,
                'link_profil' => $request->link_profil,
                'link_presentation' => $request->link_presentation,
                'link_mockup' => $request->link_mockup
            ]
        );
        return redirect('/profil');
    }

    public function profil()
    {
        $user = Auth::user();
        $kategori_lomba = KategoriLomba::where('event_id', Auth::user()->event_id)->get();
        $karya = Karya::where('user_id', Auth::user()->id)->first();
        $data = compact('user', 'kategori_lomba', 'karya');
        return view('expo.profil', $data);
    }

    public function pembayaran()
    {
        $user = Auth::user();
//        dd($user);
        $harga_satuan = number_format(300000);
        if ($user->kategori_peserta == "kelompok") {
            if ($user->event_id == 1) {
                $total_harga = number_format($user->anggota->count() * 300000);
            } else if ($user->event_id == 2) {
                $kategori_lp = KategoriLp::find($user->kategori_lp);
                $harga_satuan = number_format($kategori_lp->harga);
                $total_harga = number_format($user->anggota->count() * $kategori_lp->harga);
            }
        } else {
            if ($user->event_id == 1) {
                $total_harga = number_format(300000);
            } else if ($user->event_id == 2) {
                $kategori_lp = KategoriLp::find($user->kategori_lp);
                $harga_satuan = number_format($kategori_lp->harga);
                $total_harga = number_format($kategori_lp->harga);
            }
        }
        $data = compact('user', 'total_harga', 'harga_satuan');
        return view('expo.bukti_pembayaran', $data);
    }

    public function postPembayaran(Request $request)
    {
//        dd($request);
        $user = User::findOrFail(Auth::user()->id);
//        dd($user);
        $filename = today()->format('Y-m-d') . rand('00000', '99999') . '.png';
        if ($request->bukti_pembayaran != null) {

            Storage::disk('upload')->putFileAs('paidbill', $request->bukti_pembayaran, $filename);

            $user->bukti_pembayaran = $filename;
            $user->save();
            return redirect('/profil');
        } else {
            return redirect(route('bukti_pembayaran'));
        }
    }

    public function tahap_validasi()
    {
        return view('expo.tahap_validasi');
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
        $cekemail = User::where('email', $input['email'])->where('id', '!=', $user->id)->get();
        if ($cekemail->count() == 0) {
            if ($input['password'] == '') {
                $input['password'] = $user->password;
            } else {
                $input['password'] = Hash::make($input['password']);
            }
            $user->password = $input['password'];
            $user->email = $input['email'];
            $user->name = $input['name'];
            $user->save();
            if ($user) {
                return redirect('profil')->with('success', 'Data berhasil diupdate di server');
            } else {
                return redirect('profil')->with('fail', 'Data gagal diupdate di server');
            }
        } else {
            return redirect('profil')->with('fail', 'Data gagal diupdate di server, email telah terdaftar di akun lainnya');
        }
    }

    public function profilSimulasi()
    {
        $user = Auth::user();
        if ($user->role == 'admin' || $user->role == 'pengunjung') {
            abort(404);
        }
        $event = Event::where('status', 1)->latest()->first();
        $karya = Karya::where('user_id', $user->id)->first();
//        dd($karya);
        if ($karya != null) {
            $foto_produk = KaryaFoto::where('karya_id', $karya->id)->latest()->get();
        } else {
            $foto_produk = null;
        }
        $kategori_lomba = KategoriLomba::get();
        $data = compact('user', 'event', 'karya', 'kategori_lomba', 'foto_produk');
        return view('expo.profil-simulasi', $data);
    }

    public function karyaUpdate(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();
        $karya = Karya::where('user_id', $user->id)->latest()->first();
        // FOTO TIM
        if ($request->has('foto_tim')) {
            $validatedData = $request->validate([
                'foto_tim' => 'mimes:jpeg,bmp,png,jpg|max:2000',
            ]);
            if ($karya->foto_tim != '') {
                $this->deletefoto($karya->foto_tim);
            }
            $foto_tim = $input['foto_tim'];
            $foto_timname = 'fotoTim-' . md5(\Carbon\Carbon::now() . $foto_tim->getClientOriginalName()) . '.' . $foto_tim->getClientOriginalExtension();
            $foto_tim->move('uploads/karyas', $foto_timname);
            $input['foto_tim'] = $foto_timname;
        }
        // FOTO POSTER
        if ($request->has('foto_poster')) {
            $validatedData = $request->validate([
                'foto_poster' => 'mimes:jpeg,bmp,png,jpg|max:2000',
            ]);
            if ($karya->foto_poster != '') {
                $this->deletefoto($karya->foto_poster);
            }
            $foto_poster = $input['foto_poster'];
            $foto_postername = 'fotoPoster-' . md5(\Carbon\Carbon::now() . $foto_poster->getClientOriginalName()) . '.' . $foto_poster->getClientOriginalExtension();
            $foto_poster->move('uploads/karyas', $foto_postername);
            $input['foto_poster'] = $foto_postername;
        }
        // PROPOSAL
        if ($request->has('proposal')) {
            $validatedData = $request->validate([
                'proposal' => 'mimes:docx,doc,pdf|max:2000',
            ]);
            if ($karya->proposal != '') {
                $this->deletefoto($karya->proposal);
            }
            $proposal = $input['proposal'];
            $proposalname = 'proposal-' . md5(\Carbon\Carbon::now() . $proposal->getClientOriginalName()) . '.' . $proposal->getClientOriginalExtension();
            $proposal->move('uploads/karyas', $proposalname);
            $input['proposal'] = $proposalname;
        }
        // echo $input['nama'];
        // echo $karya;
        // exit;
        $karya->update($input);
        $karya->save();
        if ($karya) {
            return redirect('profil')->with('success', 'Data berhasil diupdate di server');
        } else {
            return redirect('profil')->with('fail', 'Data gagal diupdate di server');
        }
    }

    public function karyaFoto(Request $request)
    {
        $input = $request->all();
        // $validatedData = $request->validate([
        //     'foto' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',
        // ]);
        $user = Auth::user();
        $karya = Karya::where('user_id', $user->id)->latest()->first();
        $foto = $input['foto'];
        $fotoname = 'foto-' . md5(\Carbon\Carbon::now() . $foto->getClientOriginalName()) . '.' . $foto->getClientOriginalExtension();
        $foto->move('uploads/karyafotos', $fotoname);
        $input['foto'] = $fotoname;
        $input['karya_id'] = $karya->id;
        $data = KaryaFoto::create($input);
        if ($data) {
            return redirect('profil')->with('success', 'Foto berhasil diupload di server');
        } else {
            return redirect('profil')->with('fail', 'Foto gagal diupload di server');
        }
    }

    public function karyaFotoDelete($id)
    {
        $data = KaryaFoto::findOrFail($id);
        $this->deletekaryafoto($data->foto);
        $data->delete();
        if ($data) {
            return redirect('profil')->with('success', 'Data berhasil diupdate di server');
        } else {
            return redirect('profil')->with('fail', 'Data gagal diupdate di server');
        }
    }

    public function deletefoto($fotoname)
    {
        // path folder
        $path = 'uploads/karyas/';
        // delete gambar bisa jadikan if true or false misal false kasih konidisi etc
        if (\File::delete($path . $fotoname)) {
            return true;
        }
    }

    public function deletekaryafoto($fotoname)
    {
        // path folder
        $path = 'uploads/karyafotos/';
        // delete gambar bisa jadikan if true or false misal false kasih konidisi etc
        if (\File::delete($path . $fotoname)) {
            return true;
        }
    }

    public function virtualexpo()
    {
        if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin') {
//            $jenjang = 'smp';
//            $kategori = 'kriya';
//            switch ($jenjang) {
//                case 'smp':
//                    $cjenjang = 'SMP/MTS';
//                    break;
//                case 'sma':
//                    $cjenjang = 'SMA/SMK/MAN';
//                    break;
//            }
//            switch ($kategori) {
//                case 'kriya':
//                    $ckategori = 'Kriya';
//                    break;
//                case 'fashion':
//                    $ckategori = 'Fashion';
//                    break;
//                case 'food-and-beverage':
//                    $ckategori = 'Food and beverage';
//                    break;
//                case 'aplikasi-dan-game':
//                    $ckategori = 'Aplikasi dan Game';
//                    break;
//                case 'desain-grafis':
//                    $ckategori = 'Desain Grafis';
//                    break;
//            }
            $now = \Carbon\Carbon::now();
            $event = Event::latest()->first();
//            $karyas = User::where('event_id', $event->id)->get();
            $karya = Karya::where('event_id', $event->id)->get();
//            dd($karyas);
            return view('expo.simulasi.expo-list', compact('event', 'now', 'karya'));
        } else {
            abort(404);
        }
    }

    public function expoJenjangKategori($jenjang, $kategori)
    {
        if (Auth::user()->role == 'admin') {
            if ($jenjang == 'smp' || $jenjang == 'sma') {
                if ($kategori == 'desain-grafis' || $kategori == 'aplikasi-dan-game' || $kategori == 'food-and-beverage' || $kategori == 'fashion' || $kategori == 'kriya') {
                    $karya = User::whereExists(function ($query) {
                        $query->select(Karya::raw(1))
                            ->from('karyas')
                            ->whereRaw('karyas.user_id = users.id');
                    })->first();
                    $now = \Carbon\Carbon::now();
//                    $karyas = Karya::where('event_id', $event->id)->where('jenjang', $cjenjang)->where('kategori', $ckategori)->get();
                    return view('expo.expo-list', compact('jenjang', 'kategori'));
                } else {
                    abort(404);
                }
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }

    public function virtualexpoJenjangKategori($jenjang, $kategori)
    {
        if (Auth::user()->role == 'admin') {
            if ($jenjang == 'smp' || $jenjang == 'sma') {
                if ($kategori == 'desain-grafis' || $kategori == 'aplikasi-dan-game' || $kategori == 'food-and-beverage' || $kategori == 'fashion' || $kategori == 'kriya') {
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
                        case 'food-and-beverage':
                            $ckategori = 'Food and beverage';
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
                } else {
                    abort(404);
                }
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }

    public function expoDetailProduct($jenjang, $kategori, $id, $slug)
    {
        if (Auth::user()->role == 'admin') {
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
                case 'Food and beverage':
                    $kategori = 'food-and-beverage';
                    break;
                case 'Aplikasi dan Game':
                    $kategori = 'aplikasi-dan-game';
                    break;
                case 'Desain Grafis':
                    $kategori = 'desain-grafis';
                    break;
            }
            $statuslike = Komentar::where('user_id', Auth::user()->id)->where('karya_id', $id)->where('liked', 1)->latest()->first();
            return view('expo.expo-detail', compact('data', 'jenjang', 'kategori', 'karyas', 'statuslike'));
        } else {
            abort(404);
        }
    }

    public function show($id)
    {
        $auth = Auth::user();
        if ($auth->role == 'admin' || $auth->role == 'pengunjung') {
            abort(404);
        }
        $event = Event::where('status', 1)->latest()->first();
        $karya = Karya::find($id);
        $karyas = Karya::get();
        $user = User::find($karya->user_id);
        $foto_produk = KaryaFoto::where('karya_id', $id)->latest()->get();
        $kategori_lomba = KategoriLomba::get();
        $data = compact('auth', 'user', 'event', 'karya', 'kategori_lomba', 'foto_produk', 'karyas');
        return view('expo.simulasi.expo-detail', $data);
    }
}
