@extends("main")



@section("content_frontend")

{{-- #HERO --}}
<section class="section" id="hero">
    <div class="container flex justify-between">

        <div class="left-side">
            <img src="{{ asset("assets/images/home.svg") }}" width="500" height="475" alt="">
        </div>

        <div class="right-side max-w-2xl">
            <h1 class="text-xl">Confuse with your <span class="span">error?</span></h1>
            <h3 class="text-md">Try to find the error in here</h3>
            <div>
                <div class="text-slate-400 text-md relative mt-4"><p>
                    <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M11 18V10H9.12L11.12 6H5.38L3 10.76V18M9 16H5V11.24L6.62 8H7.88L5.88 12H9M21 18V10H19.12L21.12 6H15.38L13 10.76V18M19 16H15V11.24L16.62 8H17.88L15.88 12H19Z" />
                    </svg>Don’t Push Yourself To Fix Errors, But Look At The Existing Cases
                        <svg style="width:50px;height:50px; float: right" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M13 6V14H14.88L12.88 18H18.62L21 13.24V6M15 8H19V12.76L17.38 16H16.12L18.12 12H15M3 6V14H4.88L2.88 18H8.62L11 13.24V6M5 8H9V12.76L7.38 16H6.12L8.12 12H5Z" />
                        </svg>
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-4 mt-16">
                <img src="{{ asset("assets/images/taylor.png") }}" alt="">
                <h2 class="text-lg">
                    <span class="span">Taylor</span> Aswell
                </h2>
            </div>
        </div>

    </div>
</section>

{{-- #ABOUT --}}
<section class="section" id="about">
    <div class="container flex justify-between gap-10">

        <div class="left-side">
            <img src="{{ asset("assets/images/about.svg") }}" width="650" height="475" alt="">
        </div>

        <div class="right-side max-w-2xl">
            <h1 class="text-xl"><span class="span">About</span> Us </h1>
            <div class="text-slate-400 text-md relative mt-4">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
        </div>

    </div>
</section>

{{-- #REVIEWS --}}
<section class="section" id="reviews">
    <div class="container">

        <h1 class="text-lg text-center"> <span class="span">R</span>eviews</h1>

        <div>
            <div class="card-list mt-10 mb-16 flex items-center gap-10 flex-wrap">
                <div class="card-item bg-white rounded-lg shadow-[rgba(0,_0,_0,_0.35)_0px_5px_15px] px-6 py-4 w-max flex-1">
                    <p class=" italic"><span class="span text-lg">"</span> 
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, libero.
                    <span class="span text-lg">"</span></p>
                    <div class="flex items-center gap-4 mt-4">
                        <figure>
                            <img src="{{ asset("assets/images/taylor.png") }}" alt="" width="50" height="50">
                        </figure>
                        <h3 class="text-md"><span class="span">Taylor</span> Aswell </h3>
                    </div>
                </div>
                <div class="card-item bg-white rounded-lg shadow-[rgba(0,_0,_0,_0.35)_0px_5px_15px] px-6 py-4 w-max flex-1">
                    <p class=" italic"><span class="span text-lg">"</span> 
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, libero.
                    <span class="span text-lg">"</span></p>
                    <div class="flex items-center gap-4 mt-4">
                        <figure>
                            <img src="{{ asset("assets/images/taylor.png") }}" alt="" width="50" height="50">
                        </figure>
                        <h3 class="text-md"><span class="span">Taylor</span> Aswell </h3>
                    </div>
                </div>
                <div class="card-item bg-white rounded-lg shadow-[rgba(0,_0,_0,_0.35)_0px_5px_15px] px-6 py-4 w-max flex-1">
                    <p class=" italic"><span class="span text-lg">"</span> 
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, libero.
                    <span class="span text-lg">"</span></p>
                    <div class="flex items-center gap-4 mt-4">
                        <figure>
                            <img src="{{ asset("assets/images/taylor.png") }}" alt="" width="50" height="50">
                        </figure>
                        <h3 class="text-md"><span class="span">Taylor</span> Aswell </h3>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-center my-10">
                <a href="{{ route("reviews.create") }}" class="border border-red-primary p-4 rounded-md text-black hover:bg-red-primary hover:text-white font-semibold transition ease-in-out duration-200">
                    I want give a review too 😊
                </a>
            </div>

            <div class="pagination flex items-center justify-center gap-6">
                <button class="bg-red-primary rounded-full text-white w-10 h-10 leading-10 hover:bg-slate-800 transition duration-200">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </button>
                <button class="bg-red-primary rounded-full text-white w-10 h-10 leading-10 hover:bg-slate-800 transition duration-200">
                    <ion-icon name="chevron-forward-outline"></ion-icon>
                </button>
            </div>
        </div>

    </div>
</section>

{{-- #Contact --}}
<section class="section" id="contact">
    <div class="container">

        <h1 class="text-lg text-center"> <span class="span">C</span>ontact</h1>

        <div class="mt-10 mb-16 flex justify-between flex-wrap">
            <div class="left-side">
                <img src="{{ asset("assets/images/contact.svg") }}" width="625" height="475" alt="">
            </div>
            <div class="flex-1">
                <form action="">
                    @csrf

                    <div class="mb-10">
                        <label for="name" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">N</span>ame</label>
                        <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200">
                            <input type="text" name="name" id="name" class="" value="{{ old('name') }}" class="" placeholder="Your name..." >
                        </div>
                    </div>

                    <div class="mb-10">
                        <label for="message" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">M</span>essage</label>
                        <textarea name="message" id="" class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200 w-full" rows="10"></textarea>
                    </div>

                    <div class="flex justify-center items-center">
                        <button type="submit" class="flex items-center gap-4 bg-red-primary p-4 rounded-lg text-white transition duration-200">
                            Send
                            <ion-icon name="send-outline"></ion-icon>
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</section>
    
@endsection