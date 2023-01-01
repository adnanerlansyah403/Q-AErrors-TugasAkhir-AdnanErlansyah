@extends("main")

@section("title", "My Review - Errors")

@section("content_frontend")

<section class="section">
    <div class="container">
        <p class="text-[18px]"><span class="span font-bold">Review </span>Saya</p>


        <x-user.layouts.partials.header> 
            <div class="flex-1 flex items-center justify-between px-6 py-6 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-max">
                <div class="flex items-center gap-2">
                    @if(Auth::user()->photo_path)
                        <img src="{{ asset( 'storage/' . Auth::user()->photo_path) }}" width="40" height="40" alt="photoprofile" class="rounded-full">
                    @endif
                    <h1 class="text-md">Hello <span class="span font-bold">{{ Auth::user()->name }}</span></h1>
                </div>
                <p class="text-[20px] text-gray-500">
                    {{ Auth::user()->email }}
                </p>
            </div>
        </x-user.layouts.partials.header>


        {{-- Card Form --}}
        <div class="w-full mt-6 flex flex-wrap items-center gap-6">
            <div class="card-item gap-6 px-6 py-6 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-full">

                <h1 class="text-center text-lg font-bold">My <span class="span">Message</span></h1>

                <p class="text-md text-center italic my-10">
                    <span class="span text-lg">"</span>
                    {{ $myReview->message }}
                    <span class="span text-lg">"</span>
                </p>
                
                <div class="mb-2 flex items-center justify-center">
                    <a href="{{ route("users.myreview.edit", [
                            $myReview,
                            Auth::user()->username
                        ]) }}" type="submit" href="#notanswer" class="w-max flex items-center gap-2 font-bold outline outline-1 outline-red-primary px-6 py-4 rounded-lg hover:bg-slate-800 hover:text-white transition duration-200 hover:outline-none">
                        <ion-icon name="pencil" class="text-[20px]"></ion-icon>
                        <p>
                            <span class="span">Edit</span> My Review
                        </p>
                    </a>
                </div>

            </div>
        </div>


    </div>
</section>
    
@endsection