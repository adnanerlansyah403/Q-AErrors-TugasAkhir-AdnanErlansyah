@extends("main")

@section("title", "Detail Cari Masalah")


@section("content_frontend")

<style>
    pre {
    margin: 0;
    padding: 16px;
    background-color: #2e2f30;
    border-radius: 3px;
    }

    code {
        font-family: Consolas, "Courier New", monospace;
        font-size: 14px;
        color: white;
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


<section class="section">
    <div class="container">

        <div class="flex items-center justify-between">
            <h1 class="mb-6"><span class="span font-bold">Cari Masalah</span> / Details Masalah</h1>
    
            <a href="{{ route("errors.searcherror.index") }}" class="flex items-center gap-4 bg-red-primary p-4 rounded-lg text-white transition duration-200 w-max">
                Kembali
            </a>
        </div>

        {{-- Show Qeustion: details q, comment form, comment list --}}
        @livewire("admin.card.show-question", ["question" => $question])


    </div>
</section>


@endsection