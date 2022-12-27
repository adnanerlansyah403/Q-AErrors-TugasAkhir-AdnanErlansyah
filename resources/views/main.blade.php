<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield("title", "Q&A Errors")</title>
        @vite('resources/css/app.css')
        
        {{-- AlpineJS --}}
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    </head>
    <body class="antialiased"
        x-data="{
            headerActive: false,
            errorActive: false
        }"
    >

        @include("layouts.header")

        <main>
            <article>

                @yield("content_frontend")

            </article>
        </main>

        @include("layouts.footer")

        {{-- IonIcons --}}
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    </body>
</html>
