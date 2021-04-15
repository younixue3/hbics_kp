<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Post;

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
}
