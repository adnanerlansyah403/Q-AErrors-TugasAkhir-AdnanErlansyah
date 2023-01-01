<div class="mt-6">



    @if(session()->has('successLike'))
        <div class="alert alert-success active" x-ref="alertComponent">
            <a id="dismissComponent" x-on:click="$refs.alertComponent.classList.remove('active')" class="cursor-pointer font-semibold text-white">
                Dismiss
            </a>  
            <div class="flex items-center justify-between text-white mt-4">
                <div class="title flex items-center gap-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z" fill="currentColor"/>
                        </svg>
                    Successfully
                </div>
            </div>
            <p class="mt-2 text-xs text-white">
                {{ session()->get('successLike') }}
            </p>        
        </div>
    @endif
    
    <div class="px-6 py-7 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-full mt-4">

        @if($question->thumbnail_path)
            <figure class="mb-6">
                <img src="{{ asset("storage/" . $question->thumbnail_path) }}" alt="imagerror" class="rounded-lg w-full object-cover h-[600px]">
            </figure>
        @endif


        <div class="flex items-center justify-between">

            <div class="flex items-center gap-3">
                @if($question->user->photo_path)
                    <img src="{{ asset( 'storage/' . $question->user->photo_path) }}" width="40" height="40" alt="photoprofile" class="rounded-full">
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
        
        <p class="text-slate-600 mt-4 mb-14 text-[24px]">
            {!! $question->description_editor !!}
        </p>
        

        @if(Auth::user()) 
            @php
                $checkUserAlreadyLike = $question->likes->where('user_id', Auth::user()->id)->first();
            @endphp
            <div class="mb-2 mt-6 flex items-center justify-between gap-4">
                <div class="flex items-center gap-4">
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
                <div class="-ml-4 flex items-center gap-2">
                    <button wire:click="like" class="{{ $checkUserAlreadyLike === null && $likeStatus === false ? 'bg-white outline outline-2 outline-red-primary ' : 'bg-red-primary outline-none text-white' }} w-10 h-10 flex items-center justify-center text-center font-bold text-md rounded-full hover:bg-red-primary hover:text-white hover:outline-none transition ease-out duration-200">
                        
                        <ion-icon name="{{ $checkUserAlreadyLike != null || $likeStatus != false ? 'heart' : 'heart-outline' }}" wire:loading.remove></ion-icon>
                        
                        <div wire:loading.flex class="flex items-center justify-center">
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                    </button>
                    <span class="span font-semibold">{{ $countLikes }}</span>
                </div>
            </div>
        @endif

    </div>

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