@extends("main")

@section("title", "Detail Cari Masalah")


@section("content_frontend")


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