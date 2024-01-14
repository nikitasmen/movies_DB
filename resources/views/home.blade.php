<!Doctype html>
<html>
    <head>
        <title>Movies DB</title>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @vite('resources/js/components/css/app.css')
    </head>

    <body>
    <div id="app" class="post">
        <app-component></app-component>
        @vite('resources/js/vueApp/app.js')
    </div>
    </body>
</html>
