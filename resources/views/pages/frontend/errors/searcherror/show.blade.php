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

        <div class="mt-6">
            <div class="px-6 py-7 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-full mt-4">

                @if($question->thumbnail_path)
                    <figure class="mb-6">
                        <img src="{{ asset("storage/" . $question->thumbnail_path) }}" alt="imagerror" class="rounded-lg w-full object-cover h-[600px]">
                    </figure>
                @endif


                <div class="flex items-center justify-between">

                    <div class="flex items-center gap-4">
                        @if($question->user->photo_path)
                            <img src="{{ asset( 'storage/' . Auth::user()->photo_path) }}" width="40" height="40" alt="photoprofile" class="rounded-full">
                        @endif
                        <h3 class="font-bold">
                            <span class="span">{{ $question->user->name }}</span>
                        </h3>
                    </div>
                    
                    <h3 class="font-semibold text-[20px] -mt-4">
                        Category: 
                        <span class="span">{{ $question->category->name }}</span>
                    </h3>
                </div>

                <p class="text-\[16px]">Created at <span class="span font-bold">{{ Carbon\Carbon::parse($question->created_at)->diffForHumans() }}</span></p>

                <div class="mt-4">
                    <div class="flex items-center justify-between">
                        <h1 class="text-lg font-bold">
                            {{ $question->title }}
                        </h1>
                    </div>
                </div>
                
                <p class="text-slate-600 mb-4 text-[24px]">
                    {!! $question->description_editor !!}
                </p>
                

                @if(Auth::user()) 
                    <div class="mb-2 mt-6 flex items-center gap-4">
                        <a href="#comment" class="w-max flex items-center gap-4 font-bold outline outline-1 outline-red-primary px-6 py-4 rounded-lg hover:bg-slate-800 hover:text-white transition duration-200 hover:outline-none">
                            <ion-icon name="chatbox-ellipses-outline" class="text-md"></ion-icon>
                            <p><span class="span">Tambah</span> Komentar</p>
                        </a>
                        @if (Auth::user()->id == $question->user_id)
                            <a href="{{ route("users.myquestion.edit", $question) }}" class="w-max flex items-center gap-4 font-bold outline outline-1 outline-red-primary px-6 py-4 rounded-lg hover:bg-slate-800 hover:text-white transition duration-200 hover:outline-none">
                                <ion-icon name="pencil-outline"></ion-icon>
                                <p><span class="span">Edit</span> Question</p>
                            </a>
                        @endif
                    </div>
                @endif

            </div>

            {{-- <p class="text-md mt-10"><span class="span">Jawaban </span>({{ count($question->comments) }})</p> --}}


            @if (Auth::user())
                {{-- Component Comment Question --}}
                @livewire("group.comment-question", [
                    "question" => $question,
                ])
            @else
                <div class="my-10 text-center flex flex-col items-center justify-center">
                    <figure class="mb-4">
                        <img src="{{ asset("assets/images/authenticate.svg") }}" alt="gambarauthenticate" width="400" height="400">
                    </figure>
                    <h1 class=" max-w-md font-bold text-md text-center">Oops, You still not authorized. Please <a href="{{ route("login") }}" class="span">Login</a> to make a comment</h1>
                </div>
            @endif

            <hr class="mt-10">

            @forelse ($question->comments as $c)

                <div class="mt-10">
                    <div class="h-max px-6 py-7 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-full mt-4">

                        <div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    @if ($c->user->photo_path)
                                        <img src="{{ asset('storage/' . $c->user->photo_path) }}" width="40" height="40" alt="photoprofile" />
                                    @else
                                        @switch($c->user->gender)
                                            @case('l')
                                                <img src="{{ asset("assets/images/man1.png") }}" width="40" height="40" alt="photoprofile">
                                                @break
                                        
                                            @default
                                                <img src="{{ asset("assets/images/woman1.png") }}" width="40" height="40" alt="photoprofile">
                                        @endswitch
                                    @endif
                                    <h3 class="font-bold">
                                        <span class="span">{{ $c->user->name }}</span>
                                    </h3>
                                </div>
                                @if($c->user_id == Auth::user()->id)
                                    <a href="{{ route("errors.searcherror.comment.destroy", [
                                        $c->question,
                                        $c
                                    ]) }}" class="text-md w-10 h-10 flex items-center justify-center rounded-lg text-white bg-red-primary hover:bg-slate-800
                                    transition duration-200 ease-in-out">
                                        <ion-icon name="trash-outline"></ion-icon>
                                    </a>
                                @endif
                            </div>
                            <p class="text-[16px] mt-4">Answered at <span class="span">{{ Carbon\Carbon::parse($c->created_at)->diffForHumans() }}</span></p>
                        </div>

                        
                        <p class="text-slate-600 mt-6 text-[20px]">
                           {{ $c->message }}
                        </p>

                    </div>
                </div>
            
            @empty
                <div class="flex flex-col items-center w-full mt-10">
                    <img src="{{ asset("assets/images/nodata.svg") }}" width="300" height="300" alt="">
                    <h1 class="text-md font-bold mt-4">Still No <span class="span">Comment</span></h1>
                </div>
            @endforelse
                

            </div>


    </div>
</section>


@endsection