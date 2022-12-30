@extends("main")

@section("title", "My Profile")


@section("content_frontend")

<section class="section">
    <div class="container">
        <p class="text-[18px]"><span class="span font-bold">Profile </span>Saya</p>

        <div class="flex items-center gap-10">
            <div class="flex items-center gap-6 px-6 py-7 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-max">
                <a href="{{ route("users.myquestion.index") }}" class="{{ $currentRoute == 'users.myquestion.index' ? 'bg-slate-800 outline-none' : 'outline outline-1 outline-red-primary' }} font-bold px-6 py-2 rounded-lg hover:bg-slate-800 hover:text-white outline transition duration-200 hover:outline-none" style="{{ $currentRoute == 'users.myquestion.index' ? 'color: white;' : '' }}">
                    <span class="span">My</span> Question
                </a>
                <a href="{{ route("users.myanswer.index") }}" class="{{ $currentRoute == 'users.myanswer.index' ? 'bg-slate-800 outline-none' : 'outline outline-1 outline-red-primary' }} font-bold px-6 py-2 rounded-lg hover:bg-slate-800 hover:text-white transition duration-200 hover:outline-none" style="{{ $currentRoute == 'users.myanswer.index' ? 'color: white;' : '' }}">
                    <span class="span">My</span> Answer
                </a>
                <a href="{{ route("users.profile") }}" class="{{ $currentRoute == 'users.profile' ? 'bg-slate-800 outline-none' : 'outline outline-1 outline-red-primary' }} font-bold px-6 py-2 rounded-lg hover:bg-slate-800 hover:text-white transition duration-200 hover:outline-none" style="{{ $currentRoute == 'users.profile' ? 'color: white;' : '' }}">
                    <span class="span">My</span> Profile
                </a>
            </div>
            <div class="flex-1 flex items-center justify-between px-6 py-6 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-max">
                <div class="flex items-center gap-2">
                    @if(Auth::user()->photo_path)
                        <img src="{{ asset( 'storage/' . Auth::user()->photo_path) }}" width="40" height="40" alt="photoprofile" class="rounded-full">
                    @endif
                    <h1 class="text-md">Hello <span class="span">{{ Auth::user()->name }}</span></h1>
                </div>
                <p class="text-[20px] text-gray-500">
                    {{ Auth::user()->email }}
                </p>
            </div>
        </div>


        {{-- Card Form --}}
        <div class="w-full mt-6 flex flex-wrap items-center gap-6">
            <div class="card-item gap-6 px-6 py-6 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-full">
                @livewire("form.profile-form")
            </div>
        </div>


    </div>
</section>

@endsection