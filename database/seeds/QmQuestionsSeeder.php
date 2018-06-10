<?php

use Illuminate\Database\Seeder;

class QmQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'question'    =>  'Kas ir lietotnes mērķauditorija?',
                'use_for_existing'     =>  true,
                'use_for_new'         =>  true,
                'use_for_ios'      =>  true,
                'use_for_android'  =>  true,
                'type' => 'onlyone',
                'group' => 'development',
                'answers' => [
                    [
                        'answer' => 'Ikviens, kas vēlas to lietot',
                        'points' => 2,
                        'advice_if_choosed' => 'Plaša auditorija lietotnei ir vajadzīga, tomēr vieglāk izstrādāt un uzturēt lietotni, ja ,ērķauditorija ir apzināta'
                    ],
                    [
                        'answer' => 'Pēc noteiktām pazīmēm (piemēram, dzimums, vecums, nodarbošanās) atlasīta sabiedrības daļa',
                        'points' => 3,
                        'advice_if_choosed' => ''
                    ],
                    [
                        'answer' => 'Nezinu',
                        'points' => 1,
                        'advice_if_choosed' => 'Lai kvalitatīvi izstrādātu lietotni, jāpārzin mērķauditorija, kam tā domāta, jo mērķauditorija nosaka gan nepieciešamo funkcionalitāti, gan iekārtu un operētājsistēmu apjomu, kuru būs jāuztur'
                    ]
                ],
                'advices' => [
                    [
                        'points' => 1,
                        'advice' => ''
                    ],
                    [
                        'points' => 2,
                        'advice' => ''
                    ],
                    [
                        'points' => 3,
                        'advice' => ''
                    ]
                ]
            ],
            [
                'question'    =>  'Vai lietotne tiek izstrādāta gan Android, gan iOS platformai?',
                'use_for_existing'     =>  true,
                'use_for_new'         =>  true,
                'use_for_ios'      =>  true,
                'use_for_android'  =>  true,
                'type' => 'onlyone',
                'group' => 'development',
                'answers' => [
                    [
                        'answer' => 'Jā',
                        'points' => 3,
                        'advice_if_choosed' => ''
                    ],
                    [
                        'answer' => 'Nē',
                        'points' => 2,
                        'advice_if_choosed' => ''
                    ]
                ],
                'advices' => [
                    [
                        'points' => 3,
                        'advice' => ''
                    ],
                    [
                        'points' => 2,
                        'advice' => 'Ja lietotne tiek piedāvāta abām operētājsistēmām, iespējams sasniegt lielāku auditoriju'
                    ]
                ]
            ],
            [
                'question'    =>  'Kurš izvēlas lietotnē realizējamo funkcionalitāti?',
                'use_for_existing'     =>  true,
                'use_for_new'         =>  true,
                'use_for_ios'      =>  true,
                'use_for_android'  =>  true,
                'type' => 'multiple',
                'group' => 'development',
                'answers' => [
                    [
                        'answer' => 'Darba grupa uzņēmumā',
                        'points' => 2,
                        'advice_if_choosed' => ''
                    ],
                    [
                        'answer' => 'Projekta / produkta vadītājs',
                        'points' => 1,
                        'advice_if_choosed' => 'Vienpersoniska lēmumu pieņemšana mobilo lietotņu izstrādes projektos ir visnefektīvākais risinājums'
                    ],
                    [
                        'answer' => 'Tiek aptaujāti potenciālie lietotāji',
                        'points' => 3,
                        'advice_if_choosed' => ''
                    ],
                    [
                        'answer' => 'Tiek realizēta funkcionalitāte, ko ieviesuši konkurenti',
                        'points' => 2,
                        'advice_if_choosed' => ''
                    ]
                ],
                'advices' => [
                    [
                        'points' => 1,
                        'advice' => 'Izstrādājot lietotni, savarīgi ņemt vērā lietotāju domas un vajadzības. Šaura ekspertu grupa nespēj efektīvi izvērtēt visus faktorus'
                    ],
                    [
                        'points' => 2,
                        'advice' => 'Izstrādājot lietotni, savarīgi ņemt vērā lietotāju domas un vajadzības. Šaura ekspertu grupa nespēj efektīvi izvērtēt visus faktorus'
                    ],
                    [
                        'points' => 3,
                        'advice' => ''
                    ]
                ]
            ],
            [
                'question'    =>  'Kā tiek testēta lietotne?',
                'use_for_existing'     =>  true,
                'use_for_new'         =>  true,
                'use_for_ios'      =>  true,
                'use_for_android'  =>  true,
                'type' => 'multiple',
                'group' => 'quality',
                'answers' => [
                    [
                        'answer' => 'Manuāli',
                        'points' => 3,
                        'advice_if_choosed' => ''
                    ],
                    [
                        'answer' => 'Ir izstrādāti vienībtesti',
                        'points' => 2,
                        'advice_if_choosed' => ''
                    ],
                    [
                        'answer' => 'Ir izstrādāts testēšanas automatizācijas risinājums',
                        'points' => 2,
                        'advice_if_choosed' => ''
                    ]
                ],
                'advices' => [
                    [
                        'points' => 3,
                        'advice' => ''
                    ],
                    [
                        'points' => 2,
                        'advice' => 'Automatizēti testēšanas riisnājumi ir nepieciešami, taču to pielietojums mobilo lietotņu izstrādes projektos ir ierobežots'
                    ]
                ]
            ],
            [
                'question'    =>  'Kas veic testēšanu?',
                'use_for_existing'     =>  true,
                'use_for_new'         =>  true,
                'use_for_ios'      =>  true,
                'use_for_android'  =>  true,
                'type' => 'multiple',
                'group' => 'quality',
                'answers' => [
                    [
                        'answer' => 'Projekta / produkta vadītājs',
                        'points' => 2,
                        'advice_if_choosed' => ''
                    ],
                    [
                        'answer' => 'Visi uzņēmuma darbinieki',
                        'points' => 2,
                        'advice_if_choosed' => ''
                    ],
                    [
                        'answer' => 'Uzņēmumā strādā speciāli sagatavoti testētāji',
                        'points' => 3,
                        'advice_if_choosed' => ''
                    ],
                    [
                        'answer' => 'Tiek algoti testētāji kā ārpakalpojums',
                        'points' => 2,
                        'advice_if_choosed' => 'Ārpakalpojuma nolīgšana testēšanas jomā var samazināt izmakasas un  personāla riskus kā arī var būt noderīgs risinājums komplicētu, tehnoloģiksi sarežģītu risinājumu testēšanā, taču ārpakalpojumam bieži nav pieejama svarīga biznesa informācija salīdzinot ar testētājiem, kuri strādā in-house'
                    ]
                ],
                'advices' => [
                    [
                        'points' => 2,
                        'advice' => 'Kaut arī maksimāli plašs skatījums uz lietotni var dot papildus priekšrocības, profesionālu testētāju komanda būs efektīvākais riisnājums, kā nodrošināt igltspējīgas testēšanas aktivitātes'
                    ],
                    [
                        'points' => 3,
                        'advice' => ''
                    ]
                ]
            ],
            [
                'question'    =>  'Vai testēšanā tiek iesaistīti lietotāji?',
                'use_for_existing'     =>  true,
                'use_for_new'         =>  true,
                'use_for_ios'      =>  true,
                'use_for_android'  =>  true,
                'type' => 'onlyone',
                'group' => 'quality',
                'answers' => [
                    [
                        'answer' => 'Jā, ir izveidota BETA testētāju grupa, kas saņem lietotnes versijas, pirms
tās nonāk pie visiem lietotājiem',
                        'points' => 3,
                        'advice_if_choosed' => ''
                    ],
                    [
                        'answer' => 'Testē darbinieki, kas nav iesaistīti projekta izstrādē',
                        'points' => 2,
                        'advice_if_choosed' => 'Lai arī darbinieki, kas nav iesaistīti izstrāde, spēj sniegt jaunu skatījumu, reālu lietotāju skatījums var atšķirties'
                    ],
                    [
                        'answer' => 'Nē',
                        'points' => 1,
                        'advice_if_choosed' => ''
                    ]
                ],
                'advices' => [
                    [
                        'points' => 1,
                        'advice' => 'Lai arī uzņēmuma darbinieki vislabāk pārizna plānoto funkcionalitāti, visbiežāk izstrādē iesaistītie nespēj distancēties no produkta un novērtēt to kā lietotāji'
                    ],
                    [
                        'points' => 2,
                        'advice' => ''
                    ],
                    [
                        'points' => 3,
                        'advice' => ''
                    ]
                ]
            ],
            [
                'question'    =>  'Vai ir svarīgi, kāda informācija par lietotni tiek norādīta lietotņu veikalos?',
                'use_for_existing'     =>  true,
                'use_for_new'         =>  true,
                'use_for_ios'      =>  true,
                'use_for_android'  =>  true,
                'type' => 'onlyone',
                'group' => 'marketing',
                'answers' => [
                    [
                        'answer' => 'Jā',
                        'points' => 3,
                        'advice_if_choosed' => ''
                    ],
                    [
                        'answer' => 'Nē',
                        'points' => 1,
                        'advice_if_choosed' => ''
                    ]
                ],
                'advices' => [
                    [
                        'points' => 1,
                        'advice' => 'Lietotņu veikalos publicētā informācija bieži ir vienīgais kanāls, kurā iespējams lietotājiem pastāstīt par lietotnes funkciālajām iespējām'
                    ],
                    [
                        'points' => 3,
                        'advice' => ''
                    ]
                ]
            ],
            [
                'question'    =>  'Kas sagatavo par lietotni publicētos materiālus?',
                'use_for_existing'     =>  true,
                'use_for_new'         =>  true,
                'use_for_ios'      =>  true,
                'use_for_android'  =>  true,
                'type' => 'onlyone',
                'group' => 'marketing',
                'answers' => [
                    [
                        'answer' => 'Programmētāji',
                        'points' => 1,
                        'advice_if_choosed' => 'Izstrādes komanda vislabāk pārzina tehniskās nioanses, bet visbiežāk tiem nav atbilstošas kompetences mārketinga aktivitātēs'
                    ],
                    [
                        'answer' => 'Mārketinga speciālisti',
                        'points' => 3,
                        'advice_if_choosed' => ''
                    ],
                    [
                        'answer' => 'Projekta / produkta vadītājs',
                        'points' => 2,
                        'advice_if_choosed' => 'Vadītāju skatījums uz lietotni visbiežāk būs fokusēts uz biznesa vajadzību apmierināšanu, nespējot produktu pienācīgi pārdot potenciālajam lietotājam'
                    ]
                ],
                'advices' => [
                    [
                        'points' => 1,
                        'advice' => ''
                    ],
                    [
                        'points' => 2,
                        'advice' => ''
                    ],
                    [
                        'points' => 3,
                        'advice' => ''
                    ]
                ]
            ],
            [
                'question'    =>  'Vai ir pieejami materiāli, kuri apmāca lietotājus par lietotnē pieejamo funkcionalitāti?',
                'use_for_existing'     =>  true,
                'use_for_new'         =>  true,
                'use_for_ios'      =>  true,
                'use_for_android'  =>  true,
                'type' => 'onlyone',
                'group' => 'marketing',
                'answers' => [
                    [
                        'answer' => 'Jā',
                        'points' => 3,
                        'advice_if_choosed' => ''
                    ],
                    [
                        'answer' => 'Nē',
                        'points' => 1,
                        'advice_if_choosed' => ''
                    ]
                ],
                'advices' => [
                    [
                        'points' => 1,
                        'advice' => 'Paredzētā funkcionalitāte un iespējas lietotnes izstrādātājiem var likties pašsaprotamas, taču lietotāji nav gatavi tērēt laiku, lai uzminētu, kā lietotni izmantot'
                    ],
                    [
                        'points' => 3,
                        'advice' => ''
                    ]
                ]
            ],
            [
                'question'    =>  'Vai lietotnē ir iestrādāta funkcionalitāte, kas palīdz apgūt tās izmantošanu?',
                'use_for_existing'     =>  true,
                'use_for_new'         =>  true,
                'use_for_ios'      =>  true,
                'use_for_android'  =>  true,
                'type' => 'onlyone',
                'group' => 'marketing',
                'answers' => [
                    [
                        'answer' => 'Jā, lietotājam tiek demonstrēta visa funkcionalitāte',
                        'points' => 2,
                        'advice_if_choosed' => 'Apmācība ir nepieciešama, bet lietotāji atteiksies no lietotnes, kuras apgūšanai būs nepieciešams pārlieku ilgs laiks'
                    ],
                    [
                        'answer' => 'Jā, demonstrēta tiek svarīgākā funkcionalitāte',
                        'points' => 3,
                        'advice_if_choosed' => ''
                    ],
                    [
                        'answer' => 'Nē',
                        'points' => 1,
                        'advice_if_choosed' => 'Informāciju var lietotājam pasniegt arī atsevišķos mārketinga materiālos, taču ne visi būs gatavi iedziļināties tajos. Veiksmīgāk lietotāji funkcionalitāti apgūs, ja viņiem to interaktīvi demonstrēs lietotnes ietvaros'
                    ]
                ],
                'advices' => [
                    [
                        'points' => 1,
                        'advice' => ''
                    ],
                    [
                        'points' => 2,
                        'advice' => ''
                    ],
                    [
                        'points' => 3,
                        'advice' => ''
                    ]
                ]
            ],
            [
                'question'    =>  'Vai sekojat līdzi sociālajos tīklos izteiktajiem viedokļiem par lietotni?',
                'use_for_existing'     =>  true,
                'use_for_new'         =>  true,
                'use_for_ios'      =>  true,
                'use_for_android'  =>  true,
                'type' => 'onlyone',
                'group' => 'maintanance',
                'answers' => [
                    [
                        'answer' => 'Jā',
                        'points' => 3,
                        'advice_if_choosed' => ''
                    ],
                    [
                        'answer' => 'Nē',
                        'points' => 1,
                        'advice_if_choosed' => 'Lietotāji visbiežāk neinformēs izstrādātājus tiešā komunikācijā, bet negatīvu viedokli izteiks sociālajos tīklos, tādēļ publicējot jaunu lietotni vai tās atjauninājumus, sociālo tīklu monitoringam jābūt obligātai publicēšanas aktivitāšu sastāvdaļai'
                    ]
                ],
                'advices' => [
                    [
                        'points' => 1,
                        'advice' => ''
                    ],
                    [
                        'points' => 3,
                        'advice' => ''
                    ]
                ]
            ],
            [
                'question'    =>  'Vai sazinieties ar lietotājiem, kuri publicē negatīvus komentārus sociālajos tīklos?',
                'use_for_existing'     =>  true,
                'use_for_new'         =>  true,
                'use_for_ios'      =>  true,
                'use_for_android'  =>  true,
                'type' => 'onlyone',
                'group' => 'maintanance',
                'answers' => [
                    [
                        'answer' => 'Jā, lūdzam precizēt iemeslus par izteikto viedokli',
                        'points' => 3,
                        'advice_if_choosed' => ''
                    ],
                    [
                        'answer' => 'Dažreiz',
                        'points' => 2,
                        'advice_if_choosed' => ''
                    ],
                    [
                        'answer' => 'Nē',
                        'points' => 1,
                        'advice_if_choosed' => ''
                    ]
                ],
                'advices' => [
                    [
                        'points' => 1,
                        'advice' => ''
                    ],
                    [
                        'points' => 2,
                        'advice' => 'Lietotāju reakcijas novērošanai sociālajos jābūt sistemātiskai, pretējā gadījumā iespējams nokavēt brīdi, kad nepieciešama reakcija uz lietotāju pieredzes izmaiņām'
                    ],
                    [
                        'points' => 3,
                        'advice' => ''
                    ]
                ]
            ],
            [
                'question'    =>  'Vai sazinieties ar lietotājiem, kuri lietotņu veikalā novērtē lietotni ar zemu atzīmi?',
                'use_for_existing'     =>  true,
                'use_for_new'         =>  true,
                'use_for_ios'      =>  true,
                'use_for_android'  =>  true,
                'type' => 'onlyone',
                'group' => 'maintanance',
                'answers' => [
                    [
                        'answer' => 'Jā, lūdzam precizēt iemeslus par izteikto viedokli',
                        'points' => 3,
                        'advice_if_choosed' => ''
                    ],
                    [
                        'answer' => 'Dažreiz',
                        'points' => 2,
                        'advice_if_choosed' => 'Lietotāju reakcijas novērošanai lietotņu veikalos jābūt sistemātiskai, pretējā gadījumā iespējams nokavēt brīdi, kad nepieciešama reakcija uz lietotāju pieredzes izmaiņām'
                    ],
                    [
                        'answer' => 'Nē',
                        'points' => 1,
                        'advice_if_choosed' => ''
                    ]
                ],
                'advices' => [
                    [
                        'points' => 1,
                        'advice' => ''
                    ],
                    [
                        'points' => 2,
                        'advice' => ''
                    ],
                    [
                        'points' => 3,
                        'advice' => ''
                    ]
                ]
            ]
        ];

        foreach ($questions as $question){
            $q = \App\Question::create([
                'question'    =>  $question['question'],
                'use_for_existing'     =>  true,
                'use_for_new'         =>  true,
                'use_for_ios'      =>  true,
                'use_for_android'  =>  true,
                'type' => $question['type'],
                'group' => $question['group']
            ]);
            foreach($question['answers'] as $answer){
                \App\Answer::create([
                    'question_id' => $q->id,
                    'answer' => $answer['answer'],
                    'points' => $answer['points'],
                    'advice_if_choosed' => $answer['advice_if_choosed']
                ]);
            }
            foreach($question['advices'] as $advice){
                \App\Advice::create([
                    'question_id' => $q->id,
                    'points' => $advice['points'],
                    'advice' => $advice['advice']
                ]);
            }
        }
    }
}
