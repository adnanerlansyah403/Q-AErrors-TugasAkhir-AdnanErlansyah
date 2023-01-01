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

        @livewire("form.review-form", [
            "review" => $review,
        ])

    </div>
</section>

@endsection