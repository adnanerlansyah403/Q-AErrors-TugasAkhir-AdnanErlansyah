@extends("pages.backend.main_admin")

@section("title", "Details Fix Masalah - Errors")

@section("content_admin")

<div class="mx-6">
    <h3 class="mt-10"><span class="text-blue-800 font-bold dark:text-white">Admin</span> / Notification / Fix Masalah / Details Fix Masalah </h3>
    <h1 class="text-blue-800 text-4xl font-bold mt-2 dark:text-white">Details Fix Masalah</h1>    
</div>

<div class="p-6 mt-16">
    <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-gray-800  w-full mb-6 shadow-[rgba(0,_0,_0,_0.02)_0px_1px_3px_0px,_rgba(27,_31,_35,_0.15)_0px_0px_0px_1px] rounded-lg">
        <div class="px-6">
            <div class="flex flex-wrap justify-center">
                <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                    <div class="relative">
                        @if($answer->user->photo_path)
                            <img alt="gambaruser" src="{{ route($answer->user->photo_path) }}" class="shadow-xl rounded-full h-auto border-none max-w-[150px] absolute -top-20 left-1/2 -translate-x-1/2">
                        @endif
                    </div>
                    </div>
                    <div class="w-full lg:w-4/12 px-4 lg:order-3 lg:text-right lg:self-center">
                        <div class="py-6 px-3 mt-32 sm:mt-0">
                            <a href="{{ route("admin.notification.fixmasalah.update", $answer) }}" class="bg-blue-800 active:bg-blue-800 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                                Accept
                            </a>
                            <a href="{{ route("admin.notification.fixmasalah.destroy", $answer) }}" class="bg-red-600 active:bg-red-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                                Decline
                            </a>
                        </div>
                    </div>
                    <div class="pointer-events-none cursor-none opacity-0 w-full lg:w-4/12 px-4 lg:order-1">
                        <div class="flex justify-center py-4 lg:pt-4 pt-8">
                            <div class="mr-4 p-3 text-center">
                                <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">22</span><span class="text-sm text-blueGray-400">Friends</span>
                            </div>
                            <div class="mr-4 p-3 text-center">
                                <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">10</span><span class="text-sm text-blueGray-400">Photos</span>
                            </div>
                            <div class="lg:mr-4 p-3 text-center">
                                <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">89</span><span class="text-sm text-blueGray-400">Comments</span>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="text-center mt-12">
                    <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700 dark:text-white">
                    {{ $answer->user->name }}
                    </h3>
                    <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                    <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400 dark:text-white"></i>
                    {{ $answer->user->address }}
                    </div>
                    <div class="mb-2 text-blueGray-600 mt-10">
                    <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>
                        {{ $answer->user->profession ? $answer->user->profession : 'No Profession' }}
                    </div>
                    </div>
                    <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                    <div class="flex flex-wrap justify-center">
                    <div class="w-full lg:w-9/12 px-4">
                        <div class="mt-2">
                            <h3 class="text-lg font-bold dark:text-white">Pertanyaan</h3>
                            <p class="mb-4 text-lg leading-relaxed text-blueGray-700 italic">
                                <span class="font-black text-2xl text-blue-800 dark:text-white">"</span>
                                    {{ $answer->title }}
                                <span class="font-black text-2xl text-blue-800">"</span>
                            </p>
                        </div>
                        <div class="mt-6">
                            <h3 class="text-lg font-bold mb-2">Jawaban</h3>
                            <p class="text-lg text-justify leading-relaxed text-blueGray-700 dark:text-white">
                                {{ $answer->description_original }}
                            </p>
                        </div>
                    {{-- <a href="#pablo" class="font-normal text-blue-800">Show more</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection