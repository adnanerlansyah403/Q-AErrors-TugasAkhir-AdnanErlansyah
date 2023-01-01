<div class="mt-6">

    @if(session()->has('successLikeAnswer'))
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
                {{ session()->get('successLikeAnswer') }}
            </p>        
        </div>
    @endif

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
            @if ($answer->thumbnail_path)
                <figure class="w-full">
                    <img src="{{ asset( 'storage/' . $answer->thumbnail_path ) }}" alt="gambarerror" class="my-4" style="width: 100%; height: 500px;">
                </figure>
            @endif
        </div>
        
        <p class="text-slate-600 mt-4 mb-8 text-[20px]">
            {!! $answer->description_editor !!}
        </p>
        

        @if(Auth::user()) 
            @php
                $checkUserAlreadyLike = $answer->likes->where('user_id', Auth::user()->id)->first();
            @endphp
            <div class="mb-2 mt-6 flex items-center justify-between gap-4">
                <div class="flex items-center justify-between w-full">
                    @if (Auth::user()->id == $answer->user_id)
                        <a href="{{ route("users.myanswer.edit", $answer) }}" class="w-max flex items-center gap-4 font-bold outline outline-1 outline-red-primary px-6 py-4 rounded-lg hover:bg-slate-800 hover:text-white transition duration-200 hover:outline-none">
                            <ion-icon name="pencil-outline"></ion-icon>
                            <p><span class="span">Edit</span> Answer</p>
                        </a>
                    @endif
                    <div class="flex items-center gap-2">
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
            </div>
        @endif

    </div>
        
</div>