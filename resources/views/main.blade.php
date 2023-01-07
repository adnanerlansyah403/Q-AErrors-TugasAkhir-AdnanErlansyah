<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield("title", "Q&A Errors")</title>
        @vite('resources/css/app.css')
        
        {{-- AlpineJS --}}
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

        {{-- TinyMCE --}}
        <script src="https://cdn.tiny.cloud/1/u2nxm9ys2v0iwr5re916e7g6e8yjcnyzb81g34b18pmx0kk2/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="https://<hostname.tld>/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="https://cdn.tiny.cloud/1/u2nxm9ys2v0iwr5re916e7g6e8yjcnyzb81g34b18pmx0kk2/tinymce/6/plugins.min.js" referrerpolicy="origin"></script>

        {{-- Highlight Code CSS --}}
        {{-- <link rel="stylesheet" href="{{ asset("assets/css/highlight/styles/atom-one-dark.min.css") }}"> --}}

        {{-- Prism Code CSS --}}
        <link rel="stylesheet" href="{{ asset("assets/css/prism/prism.css") }}">

        @stack("styles")
        
        <style>
            .tox-statusbar__branding {
                display: none;
            }
            .tox-tinymce {
                height: 800px !important;
            }

            .topButton.active {
                bottom: 40px !important;
                opacity: 1;
                transition: .2s ease-in-out;
            }
            pre {
            margin: 0;
            padding: 16px;
            background-color: #2e2f30;
            border-radius: 3px;
            }

            code {
                font-family: Consolas, "Courier New", monospace;
                font-size: 14px;
                color: rgb(241, 180, 65);
            }

            code span {
                color: #E44B23;
            }

            code.xml {
                color: #f0d53c !important;
            }

            code.html {
                color: #E44B23;
            }

            code.css {
                color: #563D7C;
            }
        </style>
        
        {{-- Livewire Styles --}}
        
        @livewireStyles

    </head>
    <body class="antialiased"
        x-data="{
            headerActive: false,
            errorActive: false,
            buttonTop: false,
        }"
    >

    @if (session()->has('success'))
        @component("components.alert", [
            "type" => "alert-success",
            "icon" => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z" fill="currentColor"/>
                        </svg>
                    ',
            "status" => session()->has('success') ? "active" : "",
            "message" => session()->get('success')
        ])
        @endcomponent
    @endif

    @if ($errors->any())
        @component("components.alert", [
            "type" => "alert-danger",
            "icon" => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41Z" fill="currentColor"/>
                </svg>
                ',
            "status" => $errors->any() ? "active" : "",
            "message" => $errors->all()
        ])
        @endcomponent
    @endif

        @include("layouts.header")

        <main>
            <article>

                @yield("content_frontend")

            </article>
        </main>

        @include("layouts.footer")

        <a href="#" class="topButton animate-bounce flex items-center justify-center bg-red-primary text-white w-14 h-14 rounded-full fixed -bottom-20 right-10 opacity-0 transition ease-in-out duration-200">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
            <ion-icon name="arrow-up-outline"></ion-icon>
        </a>

        {{-- IonIcons --}}
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        {{-- Livewire Scripts --}}

        @livewireScripts

        <script>
            tinymce.init({
            selector: '#description',
            plugins: 'anchor autolink code codesample formatselect charmap preview fullscreen emoticons image link lists media searchreplace table wordcount',
            });
        </script>

        <script>

            const topButton = document.querySelector('.topButton');

            window.addEventListener('load', function () {
                if(window.scrollY > 200) {
                    topButton.classList.add('active');
                } else {
                    topButton.classList.remove('active');
                }
            });

            window.addEventListener("scroll", function () {
                if(window.scrollY > 200) {
                    topButton.classList.add("active");
                } else {
                    topButton.classList.remove("active");
                }
            })

        </script>

        <script src="{{ asset("assets/js/prism.js") }}"></script>
        
    </body>
</html>
