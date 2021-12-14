<?php

namespace App\Http\Controllers;

use App\Juri;
use Illuminate\Http\Request;
use App\Event;
use App\Karya;
use App\Post;
use App\Komentar;
use App\GaleriTahun;
use App\KategoriLomba;
use App\User;
use Auth;

class LandingController extends Controller
{
    //
    public function __construct()
    {
//        $this->middleware('auth');
    }
    public function beranda()
    {
        $event = Event::where('status', 1)->first();
        $beritas = Post::take(4)->orderBy('created_at', 'desc')->get();
        $kategori = KategoriLomba::get();
        // echo $event;
        // exit;
        return view('landing.index', compact('event', 'beritas', 'kategori'));
    }
    public function post()
    {
        $datas = Post::orderBy('created_at', 'desc')->paginate(5);
        // echo $event;
        // exit;
        return view('landing.berita', compact('datas'));
    }
    public function postDetail($id)
    {
        $data = Post::findOrFail($id);
        $beritas = Post::take(4)->orderBy('created_at', 'desc')->get();
        return view('landing.berita-detail', compact('data', 'beritas'));
    }
    public function expoJenjang($jenjang)
    {
        if($jenjang == 'smp' || $jenjang == 'sma')
        {
            $kategori = KategoriLomba::where('event_id', 1)->get();
            $data = compact('kategori', 'jenjang');
            return view('landing.expo', $data);
        }
        else
        {
            abort(404);
        }
    }
    public function expoJenjangKategori($jenjang, $kategori)
    {
        $event = User::where('jenjang', $jenjang)->whereHas('karya', function ($q) use ($kategori) {
            $q->where('kategori', $kategori);
        })->get();
        $now = \Carbon\Carbon::now();
//        $karyas = Karya::where('event_id', $event->id)->where('jenjang', $cjenjang)->where('kategori', $ckategori)->get();
        return view('expo.expo-list', compact('jenjang', 'kategori', 'now', 'event'));
    }
    public function expoDetailProduct($jenjang, $kategori, $id, $slug)
    {
//        dd('testing');
        $data = Karya::findOrFail($id);
        $karyas = User::where('jenjang', $jenjang)->whereHas('karya', function ($q) use ($kategori) {
            $q->where('kategori', $kategori);
        })->get();

        $statuslike = Komentar::where('user_id', Auth::user()->id)->where('karya_id', $id)->where('liked', 1)->latest()->first();
        return view('expo.expo-detail', compact('data', 'jenjang', 'kategori', 'karyas', 'statuslike'));
    }
    public function expoKomentar(Request $request, $id, $slug)
    {
        $karya = Karya::findOrFail($id);
        $user = Auth::user();
        $validatedData = $request->validate([
            'komentar' => 'required|max:255',
            ]);
        $cekkomen = Komentar::where('user_id', $user->id)->latest()->first();
        $input = $request->all();
        if($cekkomen)
        {
            $cekkomen->komentar = $input['komentar'];
            $cekkomen->save();
            return redirect()->back()->with('success', 'Komentar anda berhasil diupdate');
        }
        else
        {
            $input['user_id'] = $user->id;
            $input['karya_id'] = $karya->id;
            $input['liked'] = 0;
            $input['status'] = 1;
            $data = Komentar::create($input);
            if($data)
            {
                return redirect()->back()->with('success', 'Komentar anda berhasil dikirimkan');
            }
            else
            {
                return redirect()->back()->with('fail', 'Data gagal diupdate di server');
            }
        }
    }
    public function expoLikes($id)
    {
        $karya = Karya::find($id);
        $user = Auth::user();
        $cekkomen = Komentar::where('user_id', $user->id)->latest()->first();
        if($cekkomen)
        {
            if($cekkomen->liked == 1)
            {
                $cekkomen->liked = 0;
                $cekkomen->save();
                return redirect()->back()->with('success', 'Anda telah batal menyukai karya ini');
            }
            else
            {
                $cekkomen->liked = 1;
                $cekkomen->save();
                return redirect()->back()->with('success', 'Anda telah menyukai karya ini');
            }
        }
        else
        {
            $input['user_id'] = $user->id;
            $input['karya_id'] = $karya->id;
            $input['liked'] = 1;
            $input['status'] = 1;
            $input['komentar'] = '';
            $data = Komentar::create($input);
            if($data)
            {
                return redirect()->back()->with('success', 'Komentar anda berhasil dikirimkan');
            }
            else
            {
                return redirect()->back()->with('fail', 'Data gagal diupdate di server');
            }
        }
    }
    public function tentangKami()
    {
        $event = Event::where('id', 1)->latest()->first();
        return view('landing.tentangkami', compact('event'));
    }
    public function timeline()
    {
        $event = Event::where('status', 1)->latest()->first();
        return view('landing.timeline', compact('event'));
    }
    public function kategori()
    {
        return view('landing.kategori');
    }
    public function juri()
    {
        $juris = Juri::where('event_id', 1)->get();
        return view('landing.juri', compact('juris'));
    }
    public function galeri()
    {
        $galeris = GaleriTahun::orderBy('folder', 'desc')->paginate(6);
        return view('landing.galeri', compact('galeris'));
    }
    public function galeriDetail($id)
    {
        $galeri = GaleriTahun::findOrFail($id);
        return view('landing.galeri-detail', compact('galeri'));
    }
}
