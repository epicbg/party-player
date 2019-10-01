<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Party Player</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <b-navbar toggleable="lg" type="dark" variant="primary">
                <b-navbar-brand href="#">PartyPlayer</b-navbar-brand>
        
                {{-- Right aligned nav items --}}
                <b-navbar-nav class="ml-auto">
                    <b-nav-item><i class="fa fa-github fa-2x"></i></b-nav-item>
                </b-navbar-nav>
              </b-navbar>
              <router-view></router-view>

        </div>
    </body>
    <script src="{{ asset('js/app.js') }}"></script>
</html>
