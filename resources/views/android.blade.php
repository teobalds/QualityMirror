<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'QualityMirror') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Mono|Roboto+Slab" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/qualitymirror.css') }}">
        <script src="{{ URL::asset('js/qualitymirror.js') }}" type="text/javascript"></script>

    </head>
    <body>
        <header>
            <div class="navbar navbar-dark bg-dark box-shadow">
                <div class="container d-flex justify-content-between">
                    <a href="/" class="navbar-brand d-flex align-items-center">
                        <strong>{{ config('app.name', 'QualityMirror') }}</strong>
                    </a>
                </div>
            </div>
        </header>
        <div class="flex-center position-ref">

            <div class="container qmirror-container">
                <div class="row">
                    <h2><img class="rounded-circle" src="{{ $appimg }}" alt="{{ $appname }}}}" width="50" height="50"> {{ $appname }}</h2>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="appdescriptions">{!! nl2br(e($appdscr)) !!}</div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ratings">
                            <span>{{ $rating }} / 5</span>
                            <spans class="stars">
                                @foreach($stars as $i => $star)
                                    <span class="star {{$star}}"></span>
                                @endforeach
                            </spans>
                        </div>
                        <div>Vērtējumu skaits: {{$rates}}</div>
                        <div class="grades">
                            @foreach($rgrades as $i => $grade)
                                <div class="grade">
                                    <div class="row">
                                        <div class="col-lg-1">{{$i}}</div>
                                        <div class="col-lg-11">
                                            <div class="grade-progress progress">
                                                <div class="progress-bar bg-{{$i}}" role="progressbar" style="width: {{$grade['percents']}}%" aria-valuenow="{{$grade['percents']}}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row appdscr-extra">
                    <div class="col-lg-4">
                        <div>Faila izmērs: {{$filesize}}</div>
                        <div>Instalāciju skaits: {{$installs['display']}}</div>
                    </div>
                    <div class="col-lg-8">
                        <div>Atjaunota: {{$updated['date']}}</div>
                        <div class="appdescriptions">{!! nl2br(e($upddscr)) !!}</div>
                    </div>
                </div>
                <div class="row">
                    <div class="surveyintro">Atbildiet uz jautājumiem par izstrādes procesa organizāciju un sistēmas uzturēšanu!</div>
                </div>
                {!! Form::open([ 'route' => ['results.existing']] ) !!}
                    @foreach($questions as $q)
                        <div class="row question-row">
                            <div class="col-lg-4">
                                <div class="question">
                                    {{$q->question}}
                                </div>
                            </div>
                            <div class="col-lg-8">
                                @foreach($q->enabled_answers as $a)
                                    <div class="form-check">
                                        @if($q->type == 'onlyone')
                                            <input class="form-check-input" type="radio" name="q_{{$q->id}}" id="q_{{$q->id}}_{{$a->id}}" value="{{$a->id}}">
                                            <label class="form-check-label" for="q_{{$q->id}}_{{$a->id}}">
                                                {{$a->answer}}
                                            </label>
                                        @endif
                                        @if($q->type == 'multiple')
                                                <input class="form-check-input" type="checkbox" name="q_{{$q->id}}[{{$a->id}}]" value="" id="q_{{$q->id}}_{{$a->id}}">
                                                <label class="form-check-label" for="q_{{$q->id}}_{{$a->id}}">
                                                    {{$a->answer}}
                                                </label>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button  type="submit" class="btn btn-primary">Pabeigt</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </body>
</html>
