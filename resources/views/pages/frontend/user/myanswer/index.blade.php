@extends("main")

@section("title", "My Answer")


@section("content_frontend")

<section class="section">
    <div class="container">
        <p class="text-[18px]"><span class="span font-bold">Jawaban </span>Saya</p>

        <x-user.layouts.partials.header>
            <form action="{{ route("users.myanswer.index") }}" class="flex-1 flex items-center gap-6 px-6 py-6 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-max">
                <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200 w-full">
                    <input type="keywords" name="keywords" id="keywords" value="{{ old('keywords') }}" class="" placeholder="Your keywords..." >
                </div>

                <button type="submit" class="flex items-center gap-4 bg-red-primary p-4 rounded-lg text-white transition duration-200">
                    Search
                </button>
            </form>
        </x-user.layouts.partials.header>

        <div class="w-full mt-6 flex flex-wrap items-center gap-6">
            @forelse ($answers as $answer)
                <div class="card-item gap-6 px-6 py-6 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-[49%] h-[300px]" style="position: relative;">
                    <div class="flex items-center justify-between">
                        <div>
                            <a href="{{ route("errors.fixerror.show", $answer) }}" class="text-md font-bold mb-1">{{ $answer->title }}</a>
                            <h3 class="font-semibold text-[16px]">
                                Category: 
                                <span class="span">{{ $answer->category->name }}</span>
                            </h3>
                        </div>
                        <a href="{{ route("users.myanswer.destroy", $answer) }}" class="text-md w-10 h-10 flex items-center justify-center rounded-lg text-white bg-red-primary hover:bg-slate-800
                        transition duration-200 ease-in-out">
                            <ion-icon name="trash-outline"></ion-icon>
                        </a>
                    </div>
                    <p class="text-[18px] text-slate-500 mt-6">
                        {{ Str::limit($answer->description_original, 100) }}
                    </p>
                    <div class="flex justify-between items-center mt-6" style="position: absolute; bottom: 20px; width: -webkit-fill-available;">
                        <div>
                            <h3 class="font-bold">Created at <span class="span">{{ Carbon\Carbon::parse($answer->created_at)->diffForHumans() }}</span></h3>
                            <h3 class="font-bold">By <span class="span">{{ $answer->user->name }}</span></h3>
                        </div>
                        <div class="relative cursor-none pointer-events-none -translate-x-6">
                            <ion-icon name="heart" class="text-[44px] text-red-primary"></ion-icon>
                            <span class="absolute top-[10px] {{ $answer->likes->count() >= 1 ? 'right-[17.5px]' : 'right-[17px]' }} text-white font-semibold">
                                {{ $answer->likes->count() }}
                            </span>
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

        <div class="my-10">
            {{ $answers->links("pagination::tailwind") }}
        </div>

    </div>
</section>

@endsection