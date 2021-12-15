<?php

namespace App\Http\Controllers\expo_v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('expo_v2.content.index');
    }
}
