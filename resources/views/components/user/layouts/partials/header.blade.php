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
        <a href="{{ route("users.myreview.index") }}" class="{{ $currentRoute == 'users.myreview.index' ? 'bg-slate-800 outline-none' : 'outline outline-1 outline-red-primary' }} font-bold px-6 py-2 rounded-lg hover:bg-slate-800 hover:text-white transition duration-200 hover:outline-none" style="{{ $currentRoute == 'users.myreview.index' ? 'color: white;' : '' }}">
            <span class="span">My</span> Review
        </a>
    </div>
    {{ $slot }}
</div>