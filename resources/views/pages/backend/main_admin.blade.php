<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#0ed3cf">
    <meta name="msapplication-TileColor" content="#0ed3cf">
    <meta name="theme-color" content="#0ed3cf">

    <meta property="og:image" content="http://tailwindcomponents.com/storage/3891/conversions/temp52362-ogimage.jpg?v=2022-12-27 14:41:28">
    <meta property="og:image:width" content="1280">
    <meta property="og:image:height" content="640">
    <meta property="og:image:type" content="image/png">

    <meta property="og:url" content="https://tailwindcomponents.com/component/responsive-admin-template/landing">
    <meta property="og:title" content="Admin Dashboard along with dark mode &amp; responsive sidebar by Robin Hossain">
    <meta property="og:description" content="Admin template with responsive sidebar along with several responsive components. It has both light &amp; dark mode.">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@TwComponents">
    <meta name="twitter:title" content="Admin Dashboard along with dark mode &amp; responsive sidebar by Robin Hossain">
    <meta name="twitter:description" content="Admin template with responsive sidebar along with several responsive components. It has both light &amp; dark mode.">
    <meta name="twitter:image" content="http://tailwindcomponents.com/storage/3891/conversions/temp52362-ogimage.jpg?v=2022-12-27 14:41:28">

    <title>@yield("title", "Admin Dashboard - Errors")</title>

    {{-- AlpineJS --}}
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer=""></script>

    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css"> --}}
        @vite('resources/css/app.css')
<body class="bg-gray-200">
    <style>

      /* Compiled dark classes from Tailwind */
          .dark .dark\:divide-gray-700 > :not([hidden]) ~ :not([hidden]) {
            border-color: rgba(55, 65, 81);
          }
          .dark .dark\:bg-gray-50 {
            background-color: rgba(249, 250, 251);
          }
          .dark .dark\:bg-gray-100 {
            background-color: rgba(243, 244, 246);
          }
          .dark .dark\:bg-gray-600 {
            background-color: rgba(75, 85, 99);
          }
          .dark .dark\:bg-gray-700 {
            background-color: rgba(55, 65, 81);
          }
          .dark .dark\:bg-gray-800 {
            background-color: rgba(31, 41, 55);
          }
          .dark .dark\:bg-gray-900 {
            background-color: rgba(17, 24, 39);
          }
          .dark .dark\:bg-red-700 {
            background-color: rgba(185, 28, 28);
          }
          .dark .dark\:bg-green-700 {
            background-color: rgba(4, 120, 87);
          }
          .dark .dark\:hover\:bg-gray-200:hover {
            background-color: rgba(229, 231, 235);
          }
          .dark .dark\:hover\:bg-gray-600:hover {
            background-color: rgba(75, 85, 99);
          }
          .dark .dark\:hover\:bg-gray-700:hover {
            background-color: rgba(55, 65, 81);
          }
          .dark .dark\:hover\:bg-gray-900:hover {
            background-color: rgba(17, 24, 39);
          }
          .dark .dark\:border-gray-100 {
            border-color: rgba(243, 244, 246);
          }
          .dark .dark\:border-gray-400 {
            border-color: rgba(156, 163, 175);
          }
          .dark .dark\:border-gray-500 {
            border-color: rgba(107, 114, 128);
          }
          .dark .dark\:border-gray-600 {
            border-color: rgba(75, 85, 99);
          }
          .dark .dark\:border-gray-700 {
            border-color: rgba(55, 65, 81);
          }
          .dark .dark\:border-gray-900 {
            border-color: rgba(17, 24, 39);
          }
          .dark .dark\:hover\:border-gray-800:hover {
            border-color: rgba(31, 41, 55);
          }
          .dark .dark\:text-white {
            color: rgba(255, 255, 255);
          }
          .dark .dark\:text-gray-50 {
            color: rgba(249, 250, 251);
          }
          .dark .dark\:text-gray-100 {
            color: rgba(243, 244, 246);
          }
          .dark .dark\:text-gray-200 {
            color: rgba(229, 231, 235);
          }
          .dark .dark\:text-gray-400 {
            color: rgba(156, 163, 175);
          }
          .dark .dark\:text-gray-500 {
            color: rgba(107, 114, 128);
          }
          .dark .dark\:text-gray-700 {
            color: rgba(55, 65, 81);
          }
          .dark .dark\:text-gray-800 {
            color: rgba(31, 41, 55);
          }
          .dark .dark\:text-red-100 {
            color: rgba(254, 226, 226);
          }
          .dark .dark\:text-green-100 {
            color: rgba(209, 250, 229);
          }
          .dark .dark\:text-blue-400 {
            color: rgba(96, 165, 250);
          }
          .dark .group:hover .dark\:group-hover\:text-gray-500 {
            color: rgba(107, 114, 128);
          }
          .dark .group:focus .dark\:group-focus\:text-gray-700 {
            color: rgba(55, 65, 81);
          }
          .dark .dark\:hover\:text-gray-100:hover {
            color: rgba(243, 244, 246);
          }
          .dark .dark\:hover\:text-blue-500:hover {
            color: rgba(59, 130, 246);
          }
        /* .dark [role=tab], .dark [role=tab]:hover, [role=tab], [role=tab]:hover {
          border-color: #fff;
          color: #fff;
        } */
        /* .dark [role=tab].active, .dark [role=tab].active:hover, [role=tab].active, [role=tab].active:hover {
          border-color: #fff !important;
          color: #fff !important;
        } */


        

        /* Custom style */
        .header-right {
            width: calc(100% - 3.5rem);
        }
        .sidebar:hover {
            width: 16rem;
        }
        @media only screen and (min-width: 768px) {
            .header-right {
                width: calc(100% - 16rem);
            }        
        }
      </style>
<div x-data="setup()" :class="{ 'dark': isDark }">

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

    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

      {{-- <p x-text="isActive"></p> --}}
      <!-- Header -->
      @include("pages.backend.admin.layouts.partials.header")
      <!-- ./Header -->
    
      <!-- Sidebar -->
      @include("pages.backend.admin.layouts.partials.sidebar")
      <!-- ./Sidebar -->
    
      <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
    
        @yield("content_admin")

      </div>
    </div>
  </div>    

  <script>
    const setup = () => {
      const getTheme = () => {
        if (window.localStorage.getItem('dark')) {
          return JSON.parse(window.localStorage.getItem('dark'))
        }
        return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
      }

      const setTheme = (value) => {
        window.localStorage.setItem('dark', value)
      }

      return {
        loading: true,
        isDark: getTheme(),
        toggleTheme() {
          this.isDark = !this.isDark
          setTheme(this.isDark)
        },
      }
    }
  </script>


</body></html>