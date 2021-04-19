<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Karya;
use App\Post;
use App\GaleriTahun;

class LandingController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function beranda()
    {
        $event = Event::where('status', 1)->latest()->first();
        $beritas = Post::take(4)->get();
        // echo $event;
        // exit;
        return view('landing.index', compact('event', 'beritas'));
    }
    public function post()
    {
        $datas = Post::paginate(5);
        // echo $event;
        // exit;
        return view('landing.berita', compact('datas'));
    }
    public function postDetail($id)
    {
        $data = Post::findOrFail($id);
        $beritas = Post::take(4)->get();
        return view('landing.berita-detail', compact('data', 'beritas'));
    }
    public function expoJenjang($jenjang)
    {
        if($jenjang == 'smp' || $jenjang == 'sma')
        {
            return view('landing.expo', compact('jenjang'));
        }
        else
        {
            abort(404);
        }
    }
    public function expoJenjangKategori($jenjang, $kategori)
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
                return view('expo.expo-list', compact('jenjang', 'kategori', 'karyas', 'now', 'event'));
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
        return view('expo.expo-detail', compact('data', 'jenjang', 'kategori', 'karyas'));
    }
    public function expoKomentar(Request $request, $id, $slug)
    {
        $karya = Karya::findOrFail($id);

    }
    public function tentangKami()
    {
        $event = Event::where('status', 1)->latest()->first();
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
        $event = Event::where('status', 1)->latest()->first();
        return view('landing.juri', compact('event'));
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
