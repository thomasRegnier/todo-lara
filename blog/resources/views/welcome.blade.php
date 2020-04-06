<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>

    <div id="app">


        <h1 style="text-align: center; padding: 15px">Vue Laravel To do List</h1>
    <div style="text-align: center">
        {{--<p>--}}
            {{--<router-link :to="{ name: 'Home' }">Home</router-link> |--}}
            {{--<router-link :to="{ name: 'Hello' }">Hello World</router-link>--}}
        {{--</p>--}}

        <div class="container">
            <router-view></router-view>
        </div>

    </div>

    </div>
    <script src="/js/app.js"></script>
    </body>
</html>
