@extends("main")

@section("title", "List Not Answer")


@section("content_frontend")

<section class="section">
    <div class="container">
        <p class="font-bold text-md"><span class="span">Belum </span>Di Jawab</p>

        <div class="flex items-center gap-10">
            <div class="flex items-center gap-6 px-6 py-7 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-max">
                {{-- <a href="#all" class="font-bold outline outline-1 outline-red-primary px-6 py-2 rounded-lg hover:bg-slate-800 hover:text-white transition duration-200 hover:outline-none">
                    <span class="span">A</span>ll
                </a> --}}
                <a href="{{ route("errors.searcherror.index") }}" class="font-bold outline outline-1 outline-red-primary px-6 py-2 rounded-lg hover:bg-slate-800 hover:text-white transition duration-200 hover:outline-none">
                    <span class="span">N</span>ew
                </a>
                <a href="{{ route("errors.searcherror.notanswer.index") }}"  href="{{ route("errors.searcherror.notanswer.index") }}" class="{{ $currentRoute == 'errors.searcherror.notanswer.index' ? 'bg-slate-800 outline-none' : '' }} font-bold outline px-6 py-2 rounded-lg hover:bg-slate-800 hover:text-white transition duration-200 hover:outline-none" style="{{ $currentRoute == 'errors.searcherror.notanswer.index' ? 'color: white;' : '' }}">
                    <span class="span">Not</span> Answer
                </a>
            </div>
            <form action="{{ route("errors.searcherror.notanswer.index") }}" class="flex-1 flex items-center gap-6 px-6 py-6 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-max">
                <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200 w-full">
                    <input type="keywords" name="keywords" id="keywords" class="" value="{{ old('keywords') }}" class="w-full" placeholder="Your keywords..." style="width: 100%">
                </div>

                <button type="submit" class="flex items-center gap-4 bg-red-primary p-4 rounded-lg text-white transition duration-200">
                    Search
                </button>
            </form>
        </div>

        <div class="w-full mt-6 flex flex-wrap items-center gap-6">
            @forelse ($questions as $q)
                <div class="card-item gap-6 px-6 py-6 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-[49%] h-[300px]">
                    <a href="{{ route("errors.searcherror.show", $q) }}" class="text-md font-bold mb-1">{{ $q->title }}</a>
                    <h3 class="font-semibold text-[16px]">
                        Category: 
                        <span class="span">
                            {{ $q->category->name }}
                        </span>
                    </h3>
                    <p class="text-[18px] text-slate-500 mt-6">
                        {{ Str::limit($q->description, 100, "...") }}
                    </p>
                    <div class="flex justify-between items-center mt-6">
                        <div>
                            <h3 class="font-bold">Created at <span class="span">{{ Carbon\Carbon::parse($q->created_at)->diffForHumans() }}</span></h3>
                            <h3 class="font-bold">By <span class="span">{{ $q->user->name }}</span></h3>
                        </div>
                    </div>
                </div>
            @empty
                <div class="flex flex-col items-center w-full mt-10">
                    <img src="{{ asset("assets/images/nodata.svg") }}" width="300" height="300" alt="">
                    <h1 class="text-md font-bold mt-4">Still No <span class="span">Data</span></h1>
                </div>
            @endforelse
        </div>

    </div>
</section>

<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>

@endsection