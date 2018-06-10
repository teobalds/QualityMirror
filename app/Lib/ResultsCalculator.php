<?php
/**
 * Created by PhpStorm.
 * User: rolands
 * Date: 6/10/18
 * Time: 8:30 PM
 */

namespace App\Lib;


use App\Advice;
use App\Answer;
use App\Question;

class ResultsCalculator
{
    public static function calculate($form, $appdata = false, $os = false){
        $results = [];
        $suggestions = [];
        $totalresults = [];
        $total = 3;
        foreach ($form as $field => $values){
            if($field == '_token'){
                continue;
            }
            $fieldparts = explode('_', $field);
            $question = Question::find($fieldparts[1]);
            if(!isset($results[$question->group])){
                $results[$question->group] = [];
            }
            if(!isset($suggestions[$question->group])){
                $suggestions[$question->group] = [];
            }
            switch($question->type){
                case 'onlyone':
                    $answer = Answer::find($values);
                    $points = (int)$answer->points;
                    $results[$question->group][] = $points;
                    if(!empty($answer->advice_if_choosed)){
                        $suggestions[$question->group][] = $answer->advice_if_choosed;
                    }
                    $advicewhere = [
                        ['question_id', '=', $fieldparts[1]],
                        ['points', '=', $points]
                    ];
                    $advice = Advice::where($advicewhere)->first();
                    if(!empty($advice->advice)){
                        $suggestions[$question->group][] = $advice->advice;
                    }
                    break;
                case 'multiple':
                    $aresults = [];
                    foreach ($values as $a => $val){
                        $answer = Answer::find($a);
                        $aresults[] = (int)$answer->points;
                        if(!empty($answer->advice_if_choosed)){
                            $suggestions[$question->group][] = $answer->advice_if_choosed;
                        }
                    }
                    $minpoints = min($aresults);
                    $results[$question->group][] = $minpoints;
                    $advicewhere = [
                        ['question_id', '=', $fieldparts[1]],
                        ['points', '=', $minpoints]
                    ];
                    $advice = Advice::where($advicewhere)->first();
                    if(!empty($advice->advice)){
                        $suggestions[$question->group][] = $advice->advice;
                    }
                    break;
                default:
                    continue;
            }
        }
        if($appdata){
            $beforeHalfYear = mktime(0, 0, 0, date("m")-6, date("d"), date("Y"));
            $beforeQuarter = mktime(0, 0, 0, date("m")-3, date("d"), date("Y"));
            $lastupdated = $appdata['updated']['time'];
            if($lastupdated < $beforeHalfYear){
                $results['maintanance'][] = 1;
                $suggestions['maintanance'][] = "Vismaz rezi sešos mēnešos tirgū parādās jaunas operētājsistēmas versijas un ierīces. Lietotni katru reizi pēc nozīmīgām tirgus izmaiņām nepieciešams pāŗskatīt un pielāgot.";
            }
            if($lastupdated > $beforeHalfYear && $lastupdated < $beforeQuarter){
                $results['maintanance'][] = 2;
                $suggestions['maintanance'][] = "Samaziniet jaunu versiju piegāžu ciklus! Izlaižot jaunu versiju jums ir lieliska iespēja atgādināt par sevi lietotājiem!";
            }
            if($lastupdated > $beforeQuarter){
                $results['maintanance'][] = 3;
            }
            $installs = $appdata['installs']['calculated'];
            if($installs < 10000){
                $results['maintanance'][] = 1;
                $suggestions['maintanance'][] = "Ņemot vērā informāciju par lejupielāžu skaitu, lietotne netiek izmantota. Ja vien tā nav jauna vai ļoti šauras nišas produkts, jāapsver, vai to ir lietderīgi turpināt uzturēt!";
            }
            if($installs > 10000 && $installs < 100000){
                $results['maintanance'][] = 2;
                $suggestions['maintanance'][] = "Lai iegūtu vērā ņemamu lietotāju kopu, kas lietotni izmantos regulāri, nepieciešams palielināt lejupielāžu skaitu!";
            }
            if($installs > 100000){
                $results['maintanance'][] = 3;
            }
            $rates = $appdata['rates'];
            $raters = (int) ($rates / $installs *100);
            if($raters < 10){
                $results['maintanance'][] = 2;
                $suggestions['maintanance'][] = "Veiciet aktivitātes lai iegūtu vērtējumu lietotnei no lielākas lietotāju kopas!";
            }
            $descriptionlength = strlen($appdata['appdscr']);
            if($descriptionlength < 1000){
                $results['markenting'][] = 1;
                $suggestions['marketing'][] = "Norādītais lietotnes apraksts ir par īsu. Lietotnes apraksts bieži ir vienīgā informācija, no kuras lietotājs var uzzināt par lietotnes funkcijām. Apraksta teksts tiek izmantots arī meklēšanas algoreitmos, kas ļauj lietotni atrast.";
            }
            if($descriptionlength > 1000 && $descriptionlength < 3000){
                $results['marketing'][] = 2;
                $suggestions['marketing'][] = "Lietotnes apraksts ir svarīga informācija lietotājiem. Pārskatiet un papildiniet to!";
            }
            if($descriptionlength > 3000){
                $results['markenting'][] = 3;
            }
            $updatedescriptionlength = strlen($appdata['upddscr']);
            if($updatedescriptionlength < 100){
                $results['marketing'][] = 1;
                $suggestions['marketing'][] = "Uztveriet nopietni lietotnes atjauninājumu aprakstā norādāmo informāciju! Tā ne tikai informē lietotājus par izmaiņām, bet ir arī ir mārketinga materiāls, kas atgādina par lietotni.";
            }
            if($updatedescriptionlength > 100 && $updatedescriptionlength < 250){
                $results['markenting'][] = 2;
                $suggestions['marketing'][] = "Lietotnes atjauninājumu apraksts ir svarīgs mārkewtinga rīks. Gatavojiet šos aprakstus pēc iespējas plašākus!";
            }
            if($updatedescriptionlength > 250){
                $results['marketing'][] = 3;
            }
            $rating = $appdata['rating'];
            if($rating <= 3){
                $results['quality'][] = 1;
                $suggestions['quality'][] = "Analizējot lietotāju vērtējumus, var uzskatīt. ka lietotne ir nekvalitatīva. Nepieciešams vai nu ieguldīt nopietnu darbu lietotnes sakārtošanā!";
            }
            if($rating > 3 && $rating < 4){
                $results['quality'][] = 2;
                $suggestions['quality'][] = "Veiciet izmaiņas lietotnē vai zulabojiet komunikāciju ar saviem lietotājiem, lai uzlabotu lietotāju vērtējumus lietotnei";
            }
            if($rating >= 4 ){
                $results['quality'][] = 3;
            }
        }

        foreach ($results as $group => $res){
            $groupresult = min($res);
            $totalresults[$group] = $groupresult;
            if($groupresult < $total){
                $total = $groupresult;
            }
        }
        switch($total){
            case 1:
                $summary = 'Lietotnes izstrādes un uzturēšanas stratēģiju noteikti nepieciešams pārdomāt! Pievērsiet uzmanību tēmām, kas atzīmētas ar sarkanu vai oranžu krāsu!';
                break;
            case 2:
                $summary = 'Lai lietotne turpinātu atrastu ceļu pie saviem pastāvīgajiem lietotājiem, pievērsiet uzmanību tēmām, kas atzīmētas ar oranžu krāsu!';
                break;
            default:
                $summary = 'Apsveicam Jūs ar veiksmīgi izstrādātu un uzturētu lietotni! :)';
        }
        $appdata['results'] = $totalresults;
        $appdata['suggestions'] = $suggestions;
        $appdata['total'] = $total;
        $appdata['summary'] = $summary;

        return $appdata;
    }
}