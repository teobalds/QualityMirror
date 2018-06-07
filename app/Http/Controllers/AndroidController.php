<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ammadeuss\LaravelHtmlDomParser;

class AndroidController extends Controller
{
    public function prepare()
    {
        $data = array();
//        $url = 'https://play.google.com/store/apps/details?id=com.playrix.gardenscapes';
//        $url = 'https://play.google.com/store/apps/details?id=lv.lmt.straume';
        $url = 'https://play.google.com/store/apps/details?id=lv.lmt.lmtapplication';
        $html = file_get_contents($url);
        $appname = trim(\HTMLDomParser::str_get_html($html)->find('h1 > span')[0]->plaintext);
        $data['appname'] = $appname;
        $appimg = trim(\HTMLDomParser::str_get_html($html)->find('div.dQrBL > img')[0]->src);
        $data['appimg'] = $appimg;
        $appdscr = trim(\HTMLDomParser::str_get_html($html)->find('div.DWPxHb > content > div')[0]->plaintext);
        $data['appdscr'] = $appdscr;
        $rating = (float) trim(\HTMLDomParser::str_get_html($html)->find('div.BHMmbe')[0]->plaintext);
        $data['rating'] = $rating;
        $rates = (int) str_replace(',', '', trim(\HTMLDomParser::str_get_html($html)->find('span.EymY4b > span')[1]->plaintext));
        $data['rates'] = $rates;
        $grades = \HTMLDomParser::str_get_html($html)->find('div.mMF0fd');
        $rgrades = array();
        foreach($grades as $g){
//            dd(\HTMLDomParser::str_get_html($g)->find('span'));
            $grade = (int) trim(\HTMLDomParser::str_get_html($g)->find('span')[0]->plaintext);
            $graderates = (int) str_replace(',', '', trim(\HTMLDomParser::str_get_html($g)->find('span')[1]->title));
            $gradepercents = round(($graderates / $rates)*100);
            $rgrades[$grade] = ['total' => $graderates, 'percents' => $gradepercents];
        }
        $data['rgrades'] = $rgrades;
        //dd($data);
        return view('android', $data);
    }
}
