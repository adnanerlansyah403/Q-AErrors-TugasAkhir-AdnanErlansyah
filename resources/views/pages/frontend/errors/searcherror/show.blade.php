@extends("main")

@section("title", "Detail Cari Masalah")


@section("content_frontend")


<section class="section">
    <div class="container">

        <h1 class="mb-6"><span class="span font-bold">Cari Masalah</span> / Details Masalah</h1>

        <a href="{{ route("errors.searcherror.index") }}" class="flex items-center gap-4 bg-red-primary p-4 rounded-lg text-white transition duration-200 w-max">
            Kembali
        </a>

        <div class="mt-6">
            <div class="px-6 py-7 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-full mt-4">

                @if($question->gambar_path)
                    <figure class="mb-6">
                        <img src="{{ asset("assets/images/imagerror.png") }}" alt="imagerror" class="rounded-lg w-full object-cover h-[600px]">
                    </figure>
                @endif


                <div class="flex items-center justify-between">

                    <div class="flex items-center gap-4">
                        <img src="{{ asset("assets/images/taylor.png") }}" width="40" height="40" alt="photoprofile">
                        <h3 class="font-bold">
                            <span class="span">{{ $question->user->name }}</span>
                        </h3>
                    </div>
                    
                    <h3 class="font-semibold text-[20px] -mt-4">
                        Category: 
                        <span class="span">{{ $question->category->name }}</span>
                    </h3>
                </div>

                <p class="text-\[16px] mt-2">Created at <span class="span">{{ Carbon\Carbon::parse($question->created_at)->diffForHumans() }}</span></p>

                <div class="mt-4">
                    <div class="flex items-center justify-between">
                        <h1 class="text-lg font-bold">
                            {{ $question->title }}
                        </h1>
                    </div>
                </div>
                
                <p class="text-slate-600 mt-6 mb-20 text-[20px]">
                    {{ $question->description }}
                </p>
                

                @if(Auth::user()) 
                    <div class="mb-2">
                        <a href="#comment" class="w-max flex items-center gap-4 font-bold outline outline-1 outline-red-primary px-6 py-4 rounded-lg hover:bg-slate-800 hover:text-white transition duration-200 hover:outline-none">
                            <ion-icon name="chatbox-ellipses-outline" class="text-md"></ion-icon>
                            <p><span class="span">Tambah</span> Komentar</p>
                        </a>
                    </div>
                @endif

            </div>

            <p class="text-md mt-10"><span class="span">Jawaban </span>({{ count($question->comments) }})</p>


            @if (Auth::user())
                <form action="" class="mt-10">
                    @csrf


                    <div class="mb-6 w-full" id="comment">
                        <label for="comment" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">C</span>omment</label>
                        <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200">
                            <textarea name="comment" id="comment" rows="10" placeholder="Your comment..." class="text-md"></textarea>
                        </div>
                    </div>

                    <button type="submit" class="flex items-center gap-4 bg-red-primary p-4 rounded-lg text-white transition duration-200">
                        Send
                        <ion-icon name="send-outline"></ion-icon>
                    </button>

                </form>
            @else
                <div class="my-10 text-center flex flex-col items-center justify-center">
                    <figure class="mb-4">
                        <img src="{{ asset("assets/images/authenticate.svg") }}" alt="gambarauthenticate" width="400" height="400">
                    </figure>
                    <h1 class=" max-w-md font-bold text-md text-center">Oops, You still not authorized. Please <a href="{{ route("login") }}" class="span">Login</a> to make a comment</h1>
                </div>
            @endif

            <hr>

            @forelse ($question->comments as $c)

                <div class="mt-10">
                    <div class="h-max px-6 py-7 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-full mt-4">

                        <div>
                            <div class="flex items-center gap-4">
                                <img src="{{ asset("assets/images/taylor.png") }}" width="40" height="40" alt="photoprofile">
                                <h3 class="font-bold">
                                    <span class="span">A</span>stranoid
                                </h3>
                            </div>
                            <p class="text-[16px] mt-4">Di Jawab <span class="span">2 Jam Yang Lalu</span></p>
                        </div>

                        
                        <p class="text-slate-600 mt-6 text-[20px]">
                            Variabel yang didefinisikan dalam suatu fungsi merupakan variabel lokal sehingga hanya dapat diakses di dalam fungsi yang diinisialisasi.

                            Solusi:

                            Anda bisa menambahkan global keyword
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