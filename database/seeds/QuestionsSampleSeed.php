<?php

use Illuminate\Database\Seeder;

class QuestionsSampleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $q1 = \App\Question::create([
            'question'    =>  'Jautājums nr.1',
            'use_for_existing'     =>  true,
            'use_for_new'         =>  true,
            'use_for_ios'      =>  true,
            'use_for_android'  =>  true,
            'type' => 'onlyone',
            'group' => 'development'
        ]);

        \App\Answer::create([
            'question_id' => $q1->id,
            'answer' => 'Atbilde11',
            'points' => 1,
            'advice_if_choosed' => 'atbildes padoms 1:1'
        ]);

        \App\Answer::create([
            'question_id' => $q1->id,
            'answer' => 'Atbilde12',
            'points' => 2,
            'advice_if_choosed' => 'atbildes padoms 1:2'
        ]);

        \App\Answer::create([
            'question_id' => $q1->id,
            'answer' => 'Atbilde13',
            'points' => 2,
            'advice_if_choosed' => 'atbildes padoms 1:3'
        ]);

        \App\Answer::create([
            'question_id' => $q1->id,
            'answer' => 'Atbilde14',
            'points' => 3,
            'advice_if_choosed' => ''
        ]);

        \App\Advice::create([
           'question_id' => $q1->id,
           'points' => 1,
           'advice' => 'Jautājuma padoms 1:1'
        ]);

        \App\Advice::create([
            'question_id' => $q1->id,
            'points' => 2,
            'advice' => 'Jautājuma padoms 1:2'
        ]);

        \App\Advice::create([
            'question_id' => $q1->id,
            'points' => 3,
            'advice' => 'Jautājuma padoms 1:3'
        ]);

        $q2 = \App\Question::create([
            'question'    =>  'Jautājums nr.2',
            'use_for_existing'     =>  true,
            'use_for_new'         =>  true,
            'use_for_ios'      =>  true,
            'use_for_android'  =>  true,
            'type' => 'multiple',
            'group' => 'quality'
        ]);

        \App\Answer::create([
            'question_id' => $q2->id,
            'answer' => 'Atbilde21',
            'points' => 1,
            'advice_if_choosed' => 'atbildes padoms 2:1'
        ]);

        \App\Answer::create([
            'question_id' => $q2->id,
            'answer' => 'Atbilde22',
            'points' => 2,
            'advice_if_choosed' => 'atbildes padoms 2:2'
        ]);

        \App\Answer::create([
            'question_id' => $q2->id,
            'answer' => 'Atbilde23',
            'points' => 2,
            'advice_if_choosed' => 'atbildes padoms 2:3'
        ]);

        \App\Answer::create([
            'question_id' => $q2->id,
            'answer' => 'Atbilde24',
            'points' => 3,
            'advice_if_choosed' => ''
        ]);

        \App\Advice::create([
            'question_id' => $q2->id,
            'points' => 1,
            'advice' => 'Jautājuma padoms 2:1'
        ]);

        \App\Advice::create([
            'question_id' => $q2->id,
            'points' => 2,
            'advice' => 'Jautājuma padoms 2:2'
        ]);

        \App\Advice::create([
            'question_id' => $q2->id,
            'points' => 3,
            'advice' => 'Jautājuma padoms 2:3'
        ]);

        $q3 = \App\Question::create([
            'question'    =>  'Jautājums nr.3',
            'use_for_existing'     =>  true,
            'use_for_new'         =>  true,
            'use_for_ios'      =>  true,
            'use_for_android'  =>  true,
            'type' => 'multiple',
            'group' => 'marketing'
        ]);

        \App\Answer::create([
            'question_id' => $q3->id,
            'answer' => 'Atbilde31',
            'points' => 1,
            'advice_if_choosed' => 'atbildes padoms 3:1'
        ]);

        \App\Answer::create([
            'question_id' => $q3->id,
            'answer' => 'Atbilde32',
            'points' => 2,
            'advice_if_choosed' => 'atbildes padoms 3:2'
        ]);

        \App\Answer::create([
            'question_id' => $q3->id,
            'answer' => 'Atbilde33',
            'points' => 2,
            'advice_if_choosed' => 'atbildes padoms 3:3'
        ]);

        \App\Answer::create([
            'question_id' => $q3->id,
            'answer' => 'Atbilde34',
            'points' => 3,
            'advice_if_choosed' => ''
        ]);

        \App\Advice::create([
            'question_id' => $q3->id,
            'points' => 1,
            'advice' => 'Jautājuma padoms 3:1'
        ]);

        \App\Advice::create([
            'question_id' => $q3->id,
            'points' => 2,
            'advice' => 'Jautājuma padoms 3:2'
        ]);

        \App\Advice::create([
            'question_id' => $q3->id,
            'points' => 3,
            'advice' => 'Jautājuma padoms 3:3'
        ]);

        $q4 = \App\Question::create([
            'question'    =>  'Jautājums nr.4',
            'use_for_existing'     =>  true,
            'use_for_new'         =>  true,
            'use_for_ios'      =>  true,
            'use_for_android'  =>  true,
            'type' => 'onlyone',
            'group' => 'maintanance'
        ]);

        \App\Answer::create([
            'question_id' => $q4->id,
            'answer' => 'Atbilde41',
            'points' => 1,
            'advice_if_choosed' => 'atbildes padoms 4:1'
        ]);

        \App\Answer::create([
            'question_id' => $q4->id,
            'answer' => 'Atbilde42',
            'points' => 2,
            'advice_if_choosed' => 'atbildes padoms 4:2'
        ]);

        \App\Answer::create([
            'question_id' => $q4->id,
            'answer' => 'Atbilde43',
            'points' => 2,
            'advice_if_choosed' => 'atbildes padoms 4:3'
        ]);

        \App\Answer::create([
            'question_id' => $q4->id,
            'answer' => 'Atbilde44',
            'points' => 3,
            'advice_if_choosed' => ''
        ]);

        \App\Advice::create([
            'question_id' => $q4->id,
            'points' => 1,
            'advice' => 'Jautājuma padoms 4:1'
        ]);

        \App\Advice::create([
            'question_id' => $q4->id,
            'points' => 2,
            'advice' => 'Jautājuma padoms 4:2'
        ]);

        \App\Advice::create([
            'question_id' => $q4->id,
            'points' => 3,
            'advice' => 'Jautājuma padoms 4:3'
        ]);
    }
}
