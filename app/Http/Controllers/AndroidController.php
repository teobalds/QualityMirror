<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Ammadeuss\LaravelHtmlDomParser;

class AndroidController extends Controller
{
    public function prepare(Request $request)
    {
        $data = array();
        $url = 'https://play.google.com/store/apps/details?id=com.playrix.gardenscapes';
//        $url = 'https://play.google.com/store/apps/details?id=lv.lmt.straume';
//        $url = 'https://play.google.com/store/apps/details?id=lv.lmt.lmtapplication';
        $html = file_get_contents($url);
        $appname = trim(\HTMLDomParser::str_get_html($html)->find('h1 > span')[0]->plaintext);
        $data['appname'] = $appname;
        $appimg = trim(\HTMLDomParser::str_get_html($html)->find('div.dQrBL > img')[0]->src);
        $data['appimg'] = $appimg;
        $appdscr = trim(\HTMLDomParser::str_get_html($html)->find('div.DWPxHb > content')[0]->plaintext);
        $upddscr = trim(\HTMLDomParser::str_get_html($html)->find('div.DWPxHb > content')[1]->plaintext);
        $data['appdscr'] = $appdscr;
        $data['upddscr'] = $upddscr;
        $rating = (float) trim(\HTMLDomParser::str_get_html($html)->find('div.BHMmbe')[0]->plaintext);
        $data['rating'] = $rating;
        $rates = (int) str_replace(',', '', trim(\HTMLDomParser::str_get_html($html)->find('span.EymY4b > span')[1]->plaintext));
        $fullrates = floor($rating);
        $raterounded = round($rating);
        $halfrate = 0;
        if($raterounded > $rating){
            $halfrate = $raterounded;
        }
        $stars = array();
        for($i = 1; $i<= $fullrates; $i++){
            $stars[$i]  = 'star-active';
        }
        if($halfrate){
            $stars[$halfrate] = 'star-half';
        }
        for($i = 1; $i <=5; $i++){
            if(!array_key_exists($i, $stars)){
                $stars[$i] = 'star-inactive';
            }
        }
        $data['rates'] = $rates;
        $data['stars'] = $stars;
        $grades = \HTMLDomParser::str_get_html($html)->find('div.mMF0fd');
        $rgrades = array();
        foreach($grades as $g){
            $grade = (int) trim(\HTMLDomParser::str_get_html($g)->find('span')[0]->plaintext);
            $graderates = (int) str_replace(',', '', trim(\HTMLDomParser::str_get_html($g)->find('span')[1]->title));
            $gradepercents = (int) round(($graderates / $rates)*100);
            $rgrades[$grade] = ['total' => $graderates, 'percents' => $gradepercents];
        }
        $data['rgrades'] = $rgrades;
        $updated = strtotime(trim(\HTMLDomParser::str_get_html($html)->find('span.htlgb > div span.htlgb')[0]->plaintext));
        $data['updated'] = ['time' => $updated, 'date' => date('Y-m-d', $updated)];
        $filesize = trim(\HTMLDomParser::str_get_html($html)->find('span.htlgb > div span.htlgb')[1]->plaintext);
        $installs = trim(\HTMLDomParser::str_get_html($html)->find('span.htlgb > div span.htlgb')[2]->plaintext);
        $installs_int = (int)str_replace(['+', ','], '', $installs);
        $data['installs'] = ['display' => $installs, 'calculated' => $installs_int];
        $data['filesize'] = $filesize;
        $questions = Question::where([
            ['enabled', '=', true],
            ['use_for_existing', '=', true],
            ['use_for_android', '=', true]
        ])
            ->with('enabled_answers')
            ->inRandomOrder()->get();
        $data['questions'] = $questions;
        $request->session()->put('appdata', $data);
        return view('android', $data);
    }
}
