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
    protected $testing;

    public function __construct(array $testing = array())
    {
        $this->testing = Event::get();
    }

    public function beranda()
    {
        $event = Event::where('status', 1)->first();
        $beritas = Post::take(4)->orderBy('created_at', 'desc')->get();
        $kategori = KategoriLomba::where('event_id', 1)->get();
        $list_event = Event::get();
        return view('landing.index', compact('event', 'beritas', 'kategori', 'list_event'));
    }

    public function beranda_lp()
    {
        $event = Event::where('status', 1)->first();
        $beritas = Post::take(4)->orderBy('created_at', 'desc')->get();
        $kategori = KategoriLomba::where('event_id', 2)->get();
        $list_event = Event::get();
        return view('landing.index_lp', compact('event', 'beritas', 'kategori', 'list_event'));
    }

    public function post()
    {
        $list_event = Event::get();
        $datas = Post::orderBy('created_at', 'desc')->paginate(5);
        // echo $event;
        // exit;
        return view('landing.berita', compact('datas', 'list_event'));
    }

    public function postDetail($id)
    {
        $data = Post::findOrFail($id);
        $list_event = Event::get();
        $beritas = Post::take(4)->orderBy('created_at', 'desc')->get();
        return view('landing.berita-detail', compact('data', 'beritas', 'list_event'));
    }

    public function expoJenjang($jenjang)
    {
        $list_event = Event::get();
        if ($jenjang == 'smp' || $jenjang == 'sma') {
            $kategori = KategoriLomba::where('event_id', 1)->get();
            $data = compact('kategori', 'jenjang', 'list_event');
            return view('landing.expo', $data);
        } else {
            abort(404);
        }
    }

    public function expoJenjangKategori($jenjang, $kategori)
    {
        $list_event = Event::get();
//        dd($jenjang);
        $event = User::where('jenjang', $jenjang)->whereHas('karya', function ($q) use ($kategori) {
            $q->where('kategori', $kategori);
        })->get();
        if (Auth::user()->event_id == 1) {
            $kategorinya = KategoriLomba::where('event_id', 1)->get();
        } else {
            $kategorinya = KategoriLomba::where('event_id', 2)->get();
        }
        $kategori_view = KategoriLomba::find($kategori)->kategori;
        $now = \Carbon\Carbon::now();
//        $karyas = Karya::where('event_id', $event->id)->where('jenjang', $cjenjang)->where('kategori', $ckategori)->get();
        return view('expo.expo-list', compact('jenjang', 'kategori', 'now', 'event', 'kategori_view' ,'kategorinya', 'list_event'));
    }

    public function expoDetailProduct($jenjang, $kategori, $id, $slug)
    {
        $list_event = Event::get();
        $data = Karya::findOrFail($id);
        $this_user = User::find($data->user_id);
        $kategori_lomba = KategoriLomba::get();
        $karyas = User::where('jenjang', $jenjang)->where('id', '!=', $data->user_id)->whereHas('karya', function ($q) use ($kategori) {
            $q->where('kategori', $kategori);
        })->get();
        if (Auth::user()) {
            $statuslike = Komentar::where('user_id', Auth::user()->id)->where('karya_id', $id)->where('liked', 1)->latest()->first();
            $datas = compact('data', 'jenjang', 'kategori', 'karyas', 'statuslike', 'this_user', 'kategori_lomba', 'list_event');
        } else {
            $statuslike = null;
            $datas = compact('data', 'jenjang', 'kategori', 'karyas', 'statuslike', 'this_user', 'kategori_lomba', 'list_event');
        }
        return view('expo.expo-detail', $datas);
    }

    public function expoKomentar(Request $request, $id, $slug)
    {
        $list_event = Event::get();
        $karya = Karya::findOrFail($id);
        $user = Auth::user();
        $validatedData = $request->validate([
            'komentar' => 'required|max:255',
        ]);
        $cekkomen = Komentar::where('user_id', $user->id)->latest()->first();
        $input = $request->all();
        if ($cekkomen) {
            $cekkomen->komentar = $input['komentar'];
            $cekkomen->save();
            return redirect()->back()->with('success', 'Komentar anda berhasil diupdate');
        } else {
            $input['user_id'] = $user->id;
            $input['karya_id'] = $karya->id;
            $input['liked'] = 0;
            $input['status'] = 1;
            $data = Komentar::create($input);
            if ($data) {
                return redirect()->back()->with('success', 'Komentar anda berhasil dikirimkan');
            } else {
                return redirect()->back()->with('fail', 'Data gagal diupdate di server');
            }
        }
    }

    public function expoLikes($id)
    {
        $list_event = Event::get();
        $karya = Karya::find($id);
        $user = Auth::user();
        $cekkomen = Komentar::where('user_id', $user->id)->latest()->first();
        if ($cekkomen) {
            if ($cekkomen->liked == 1) {
                $cekkomen->liked = 0;
                $cekkomen->save();
                return redirect()->back()->with('success', 'Anda telah batal menyukai karya ini');
            } else {
                $cekkomen->liked = 1;
                $cekkomen->save();
                return redirect()->back()->with('success', 'Anda telah menyukai karya ini');
            }
        } else {
            $input['user_id'] = $user->id;
            $input['karya_id'] = $karya->id;
            $input['liked'] = 1;
            $input['status'] = 1;
            $input['komentar'] = '';
            $data = Komentar::create($input);
            if ($data) {
                return redirect()->back()->with('success', 'Komentar anda berhasil dikirimkan');
            } else {
                return redirect()->back()->with('fail', 'Data gagal diupdate di server');
            }
        }
    }

    public function tentangKami()
    {
        $list_event = Event::get();
        $event = Event::where('id', 1)->latest()->first();
        return view('landing.tentangkami', compact('event', 'list_event', 'list_event'));
    }

    public function timeline()
    {
        $list_event = Event::get();
        $event = Event::where('status', 1)->first();
        return view('landing.timeline', compact('event', 'list_event'));
    }

    public function kategori()
    {
        $list_event = Event::get();
        return view('landing.kategori', compact('list_event'));
    }

    public function juri()
    {
        $list_event = Event::get();
        $juris = Juri::where('event_id', 1)->get();
        return view('landing.juri', compact('juris', 'list_event'));
    }

    public function galeri()
    {
        $list_event = Event::get();
        $galeris = GaleriTahun::orderBy('folder', 'desc')->paginate(6);
        return view('landing.galeri', compact('galeris', 'list_event'));
    }

    public function galeriDetail($id)
    {
        $list_event = Event::get();
        $galeri = GaleriTahun::findOrFail($id);
        return view('landing.galeri-detail', compact('galeri', 'list_event'));
    }
}
