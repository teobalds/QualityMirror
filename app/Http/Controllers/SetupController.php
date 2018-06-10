<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetupController extends Controller
{
    public function action(Request $request){
        $request->session()->forget(['appdata', 'action', 'os', 'appid']);
        return view('landing');
    }

    public function os(Request $request){
        $action = $request->input('action');
        if($action != 'existing'){
            return redirect()->route('choose.action');
        }
        $request->session()->put('action', $action);
        return view('choose-os');
    }

    public function ios(Request $request){
        $os = $request->input('os');
        if($os != 'ios'){
            return redirect()->route('choose.action');
        }
        $request->session()->put('os', $os);
        return view('ios-id');
    }

    public function android(Request $request){
        $os = $request->input('os');
        if($os != 'android'){
            return redirect()->route('choose.action');
        }
        $request->session()->put('os', $os);
        return view('android-id');
    }
}
