@extends("pages.backend.main_admin")

@section("title", "Details Fix Masalah - Errors")

@section("content_admin")

<div class="mx-6">
    <h3 class="mt-10"><span class="text-blue-800 dark:text-white font-bold">Admin</span> / Notification / Reviews / Details Review </h3>
    <h1 class="text-blue-800 dark:text-white text-lg font-bold mt-2">Details Review</h1>    
</div>


<div class="p-6 mt-16">
    <div class="relative flex flex-col min-w-0 break-words bg-white dark:bg-gray-800 w-full mb-6 shadow-[rgba(0,_0,_0,_0.02)_0px_1px_3px_0px,_rgba(27,_31,_35,_0.15)_0px_0px_0px_1px] rounded-lg">
        <div class="px-6">
            <div class="flex flex-wrap justify-center">
                <div class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center">
                    <div class="relative">
                        @if ($review->user->photo_path)
                            <img alt="gambaruser" src="{{ $review->user->photo_path }}" class="shadow-xl rounded-full h-auto border-none max-w-[150px] absolute -top-20 left-1/2 -translate-x-1/2">
                        @endif
                    </div>
                    </div>
                    <div class="w-full px-4 lg:order-3 lg:text-right lg:self-center flex items-center gap-2" style="order: 1;">
                        <div class="py-6 px-3 mt-32 sm:mt-0">
                            <a href="{{ route("admin.notification.reviews.update", $review) }}" class="bg-blue-800 active:bg-blue-800 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                                Accept
                            </a>
                            <a href="{{ route("admin.notification.reviews.destroy", $review) }}" class="bg-red-600 active:bg-red-600 uppercase text-white font-bold hover:shadow-md shadow text-xs px-4 py-2 rounded outline-none focus:outline-none sm:mr-2 mb-1 ease-linear transition-all duration-150" type="button">
                                Decline
                            </a>
                        </div>
                    </div>
                    </div>
                    <div class="text-center mt-12">
                    <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700">
                    {{ $review->user->name }}
                    </h3>
                    <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                    <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                    {{ $review->user->address }}
                    </div>
                    <div class="mb-2 text-blueGray-600 mt-10">
                    <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>{{ $review->user->profession }}
                    </div>
                    </div>
                    <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                    <div class="flex flex-wrap justify-center">
                    <div class="w-full lg:w-9/12 px-4">
                        <div class="mt-6">
                            <h3 class="text-lg font-bold mb-2">Review</h3>
                            <p class="text-lg text-justify leading-relaxed text-blueGray-700 italic">
                                <span class="font-black text-2xl text-blue-800 dark:text-white">"</span>
                                {{ $review->message }}
                                <span class="font-black text-2xl text-blue-800 dark:text-white">"</span>
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