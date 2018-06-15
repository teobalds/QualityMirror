<?php

namespace App\Http\Controllers;

use App\Lib\ResultsCalculator;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function existing(Request $request)
    {
        $action = $request->session()->get('action');
        $os = $request->session()->get('os');
        $appdata = $request->session()->get('appdata');
        if(!$action || ($action == 'existing' && !$os) || ($action == 'new' && !$appdata)){
            return redirect()->route('choose.action');
        }
        $resultsdata = ResultsCalculator::calculate($request->all(), $appdata, $os);
        $resultsdata['action'] = $action;
        return view('result', $resultsdata);
    }

    public function new(Request $request)
    {
        $action = $request->session()->get('action');
        if($action != 'new'){
            return redirect()->route('choose.action');
        }
        $resultsdata = ResultsCalculator::calculate($request->all());
        $resultsdata['action'] = $action;
        return view('result', $resultsdata);
    }
}
