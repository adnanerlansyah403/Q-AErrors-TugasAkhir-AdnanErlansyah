<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield("title", "Q&A Errors")</title>
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">

        @include("layouts.header")

        <main>
            <article>

                {{-- #HERO --}}
                <section class="section">
                    <div class="container"></div>
                </section>

            </article>
        </main>

        @include("layouts.footer")

    </body>
</html>
