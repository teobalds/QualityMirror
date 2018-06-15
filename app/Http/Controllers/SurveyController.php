<?php

namespace App\Http\Controllers;

use App\Lib\PlayStoreParser;
use App\Question;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function existing(Request $request){
        $action = $request->session()->get('action');
        $os = $request->session()->get('os');
        $appid = $request->input('appid');
//        dd(['action' => $action, 'os' => $os, 'appid' => $appid]);
        if(!$action || $action != 'existing'){
            return redirect()->route('choose.action');
        }
        if(!$appid){
            return redirect()->route('choose.action');
        }
        switch ($os){
            case 'android':
                $data = PlayStoreParser::get($appid);
                if(!$data) {
                    return view('error');
                }
                break;
            case 'ios':
                #TODO: implement iTunes store parser
                break;
            default:
                return redirect()->route('choose.action');
        }
        $where = [
            ['enabled', '=', true],
            ['use_for_existing', '=', true],
            ['use_for_android', '=', true]
        ];
        $data['questions'] = $this->getQuestions($where);
        $request->session()->put('appdata', $data);
        return view('android', $data);
    }

    public function new(Request $request)
    {
        $action = $request->input('action');
        if($action != 'new'){
            return redirect()->route('choose.action');
        }
        $request->session()->put('action', $action);
        $data = array();
        $where = [
            ['enabled', '=', true],
            ['use_for_new', '=', true]
        ];
        $data['questions'] = $this->getQuestions($where);
        $request->session()->put('appdata', $data);
        return view('new', $data);
    }

    private function getQuestions($where){
        return Question::where($where)
            ->with('enabled_answers')
            ->inRandomOrder()->get();
    }
}
