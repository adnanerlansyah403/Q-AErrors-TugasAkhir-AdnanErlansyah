<header 
x-bind:class="headerActive ? 'active' : ''"
class="py-[20px] container flex items-center justify-between w-full active">
    <a href="{{ route('home') }}" class="text-xl">
        <span class="span font-bold">E</span>rrors
    </a>

    <nav>
        <ul class="flex items-center gap-9 text-md">
            <li>
                <a href="{{ route('home') }}"><span class="span">H</span>ome</a>
            </li>
            <li class="relative">
                <button class="cursor-pointer" x-on:click="errorActive = !errorActive">
                    <span class="span">E</span>rrors
                </button>
                <ul x-show="errorActive" x-transition class="mt-6 absolute top-[110%] w-[300px] shadow-[rgba(0,_0,_0,_0.16)_0px_10px_36px_0px,_rgba(0,_0,_0,_0.06)_0px_0px_0px_1px] rounded-md overflow-hidden bg-white">
                    <li class="p-4 {{ $currentRoute == "errors.searcherror.index" || $currentRoute != "errors.fixerror.index" ? 'bg-red-primary text-white hover:text-white' : 'hover:text-red-primary' }} transition duration-200 ease-in-out ">
                        <a href="{{ route("errors.searcherror.index") }}">Cari Masalah</a>
                    </li>
                    <li class="p-4 {{ $currentRoute == "errors.fixerror.index" ? 'bg-red-primary text-white hover:text-white' : 'hover:text-red-primary' }} transition duration-200 ease-in-out">
                        <a href="{{ route("errors.fixerror.index") }}">Pecahkan Masalah</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#about"><span class="span">A</span>bout</a>
            </li>
            <li>
                <a href="#reviews"><span class="span">R</span>eviews</a>
            </li>
            <li>
                <a href="#contact"><span class="span">C</span>ontact</a>
            </li>
        </ul>
    </nav>

    <div class="text-md flex items-center gap-4">
        @if (Auth::user())
            @if(Auth::user()->role->id == 1)
                <a href="{{ route("users.profile") }}">D<span class="span">ashboard</span></a>
                
            @else
                <a href="{{ route("admin.dashboard") }}">D<span class="span">ashboard</span></a>
            @endif
            <a href="{{ route("auth.logout") }}">Sign <span class="span">Out</span></a>
        @else
            <a href="{{ route("login") }}">Sign <span class="span">In</span></a>
            <a href="{{ route("register") }}">Sign <span class="span">Up</span></a>
        @endif
    </div>

</header>