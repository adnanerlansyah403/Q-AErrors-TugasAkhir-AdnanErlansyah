@extends("main")

@section("title", "My Question")


@section("content_frontend")

<section class="section">
    <div class="container">
        <p class="text-[18px]"><span class="span font-bold">Masalah </span>Saya</p>

        <x-user.layouts.partials.header> 
            <form action="{{ route("users.myquestion.index") }}" class="flex-1 flex items-center gap-6 px-6 py-6 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-max">
                <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200 w-full">
                    <input type="email" name="email" id="email" class="" value="{{ old('email') }}" class="" placeholder="Your email..." >
                </div>

                <button type="submit" class="flex items-center gap-4 bg-red-primary p-4 rounded-lg text-white transition duration-200">
                    Search
                </button>
            </form>
        </x-user.layouts.partials.header>
        

        <div class="w-full mt-6 flex flex-wrap items-center gap-6">
            @forelse ($questions as $question)
                <div class="card-item gap-6 px-6 py-6 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-[49%] h-[300px]" style="position: relative">
                    <div class="flex items-center justify-between">
                        <div>
                            <a href="{{ route("errors.searcherror.show", $question) }}" class="text-md font-bold mb-1">{{ $question->title }}</a>
                            <h3 class="font-semibold text-[16px]">
                                Category: 
                                <span class="span">{{ $question->category->name }}</span>
                            </h3>
                        </div>
                        <a href="{{ route("users.myquestion.destroy", $question) }}" class="text-md w-10 h-10 flex items-center justify-center rounded-lg text-white bg-red-primary hover:bg-slate-800
                        transition duration-200 ease-in-out">
                            <ion-icon name="trash-outline"></ion-icon>
                        </a>
                    </div>
                    <p class="text-[18px] text-slate-500 mt-6">
                        {{ $question->description }}
                    </p>
                    <div class="flex justify-between items-center mt-6" style="position: absolute; bottom: 20px; width: -webkit-fill-available;">
                        <div>
                            <h3 class="font-bold">Created at <span class="span">{{ Carbon\Carbon::parse($question->created_at)->diffForHumans() }}</span></h3>
                            <h3 class="font-bold">By <span class="span">{{ $question->user->name }}</span></h3>
                        </div>
                        <p class="flex items-center gap-2">
                            Jawaban 
                            <span class="block w-8 h-8 rounded-full leading-8 bg-red-primary text-white font-semibold text-center">
                                {{ count($question->comments) }}
                            </span>
                        </p>
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
            {{ $questions->links("pagination::tailwind") }}
        </div>

    </div>
</section>


@endsection