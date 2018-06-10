<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function existing(Request $request)
    {
        $action = $request->session()->get('action');
        $os = $request->session()->get('os');
        $appid = $request->session()->get('appid');
        $appdata = $request->session()->get('appdata');
        dd($request->session()->get('appdata'));
    }

    public function new(Request $request)
    {
        $action = $request->session()->get('action');
        $os = $request->session()->get('os');
        $appid = $request->session()->get('appid');
        $appdata = $request->session()->get('appdata');
        dd($request->session()->get('appdata'));
    }
}
