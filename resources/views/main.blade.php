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

        @stack("styles")
        
        {{-- Livewire Styles --}}
        @livewireStyles

    </head>
    <body class="antialiased"
        x-data="{
            headerActive: false,
            errorActive: false,
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

        {{-- IonIcons --}}
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        {{-- Livewire Scripts --}}
        @livewireScripts

        <script>
            tinymce.init({
            selector: '#description',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            });
        </script>
        
    </body>
</html>
