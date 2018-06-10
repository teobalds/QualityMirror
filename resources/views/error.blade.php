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
        <div class="flex-center position-ref error-place">

            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Kļūda!</h4>
                <p>Šāda lietotne neeksistē vai arī kļūdījies, ievadot identifikatoru!</p>
                <hr>
                <p class="mb-0">{{ HTML::linkRoute('choose.action', 'Uz sākumu', [], ['title' => 'Uz sākumu']) }} </p>
            </div>
        </div>
    </body>
</html>
