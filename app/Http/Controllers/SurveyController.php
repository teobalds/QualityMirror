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
        $appid = $request->session()->get('appid');
        if(!$action && $action != 'existing'){
            return redirect()->route('choose.action');
        }
        if(!$appid){
            switch ($os){
                case 'android':
                    return redirect()->route('input.android');
                    break;
                case 'ios':
                    return redirect()->route('input.ios');
                    break;
                default:
                    return redirect()->route('choose.os');
            }
        }
        switch ($os){
            case 'andoid':
                $data = PlayStoreParser::get($appid);
                break;
            case 'ios':
                #TODO: implement iTunes store parser
                break;
            default:
                return redirect()->route('choose.os');
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
        if($action != 'existing'){
            return redirect()->route('choose.action');
        }
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
