<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Erasmus+') }}</title>

    <!-- Styles -->
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset("css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    @yield('css')
    <style>
    .vertical-center {
      min-height: 80%;  /* Fallback for browsers do NOT support vh unit */
      min-height: 80vh; /* These two lines are counted as one :-)       */

      display: flex;
      align-items: center;
    }
    </style>

</head>
<body>

    <div id="app" class='vertical-center'>


        @yield('content')

      </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
