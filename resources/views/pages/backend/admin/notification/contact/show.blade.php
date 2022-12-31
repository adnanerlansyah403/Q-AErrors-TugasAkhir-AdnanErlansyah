@extends("pages.backend.main_admin")

@section("title", "Details Contact - Errors")

@section("content_admin")

<div class="mx-6">
    <h3 class="mt-10"><span class="text-blue-800 font-bold">Admin</span> / Notification / Contacts / Details Contact </h3>
    <h1 class="text-blue-800 text-lg font-bold mt-2">Details Contact</h1>    
</div>


<div class="p-6 mt-16">
    <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-gray-800 w-full mb-6 shadow-[rgba(0,_0,_0,_0.02)_0px_1px_3px_0px,_rgba(27,_31,_35,_0.15)_0px_0px_0px_1px] rounded-lg">
        <div class="px-6">
            <div class="flex flex-wrap justify-center">
                <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
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
                        <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700">
                        {{ $contact->name }}
                        </h3>
                        <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                        <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                        {{ $contact->email }}
                        </div>
                    </div>
                    <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                    <div class="flex flex-wrap justify-center">
                    <div class="w-full lg:w-9/12 px-4">
                        <div class="mt-6">
                            <h3 class="text-lg font-bold mb-2">Message</h3>
                            <p class="text-lg text-justify leading-relaxed text-blueGray-700 italic">
                                <span class="font-black text-2xl text-blue-800">"</span>
                                {{ $contact->message }}
                                <span class="font-black text-2xl text-blue-800">"</span>
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