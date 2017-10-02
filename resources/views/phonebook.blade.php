<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>phonebook</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div id="app">
            <Myheader></Myheader>
                <div class="container">
                    <router-view></router-view>
                </div>
            <Myfooter></Myfooter>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
