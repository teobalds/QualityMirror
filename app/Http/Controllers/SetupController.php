<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetupController extends Controller
{
    public function action(Request $request){
        dd(csrf_field());
        $request->session()->flush();
        return view('landing');
    }

    public function os(Request $request){
        $action = $request->input('action');
        dd($action);
        if($action != 'existing'){
            return redirect()->route('choose.action');
        }
        return view('choose-os');
    }

    public function ios(Request $request){
        return view('ios-id');
    }

    public function android(Request $request){
        return view('android-id');
    }
}
