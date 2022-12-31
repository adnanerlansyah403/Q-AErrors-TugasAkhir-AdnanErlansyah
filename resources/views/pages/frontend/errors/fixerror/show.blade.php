@extends("main")

@section("title", "Detail Pemecahan Masalah")


@section("content_frontend")

<section class="section">
    <div class="container">

        <div class="flex items-center justify-between">
            <h1 class="mb-6"><span class="span font-bold">Fix Masalah</span> / Details Fix Masalah</h1>
    
            <a href="{{ route("errors.fixerror.index") }}" class="flex items-center gap-4 bg-red-primary p-4 rounded-lg text-white transition duration-200 w-max">
                Kembali
            </a>
        </div>

        <div class="mt-6">
            <div class="px-6 py-7 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-full mt-4">


                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        @if($answer->user->photo_path)
                        <img src="{{ asset( 'storage/' . $answer->user->photo_path) }}" width="40" height="40" alt="photoprofile" class="rounded-full">
                        @endif
                        <h3 class="font-bold">
                            <span class="span">{{ $answer->user->name }}</span>
                        </h3>
                    </div>
                    
                    <h3 class="font-semibold text-[20px] -mt-4">
                        Category: 
                        <span class="span">{{ $answer->category->name }}</span>
                    </h3>
                </div>

                <p class="text-\[16px] mt-2">Created at <span class="span">{{ Carbon\Carbon::parse($answer->created_at)->diffForHumans() }}</span></p>

                <div class="mt-4 mb-10">
                    <div class="flex items-center justify-between">
                        <h1 class="text-lg font-bold">
                            {{ $answer->title }}
                        </h1>
                    </div>
                </div>
                
                <p class="text-slate-600 mt-4 mb-8 text-[20px]">
                    {!! $answer->description_editor !!}
                </p>
                

                @if(Auth::user()) 
                    <div class="mb-2 mt-4 flex items-center gap-4">
                        @if (Auth::user()->id == $answer->user_id)
                            <a href="{{ route("users.myanswer.edit", $answer) }}" class="w-max flex items-center gap-4 font-bold outline outline-1 outline-red-primary px-6 py-4 rounded-lg hover:bg-slate-800 hover:text-white transition duration-200 hover:outline-none">
                                <ion-icon name="pencil-outline"></ion-icon>
                                <p><span class="span">Edit</span> Question</p>
                            </a>
                        @endif
                    </div>
                @endif

            </div>
                

            </div>


    </div>
</section>

@endsection