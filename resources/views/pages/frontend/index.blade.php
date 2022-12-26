@extends("main")



@section("content_frontend")

{{-- #HERO --}}
<section class="section">
    <div class="container flex justify-between">

        <div class="left-side">
            <img src="{{ asset("assets/images/home.svg") }}" width="500" height="475" alt="">
        </div>

        <div class="right-side max-w-2xl">
            <h1 class="text-xl">Confuse with your <span class="span">error?</span></h1>
            <h3 class="text-md">Try to find the error in here</h3>
            <div>
                <div class="text-slate-400 text-md relative mt-4">
                    <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M11 18V10H9.12L11.12 6H5.38L3 10.76V18M9 16H5V11.24L6.62 8H7.88L5.88 12H9M21 18V10H19.12L21.12 6H15.38L13 10.76V18M19 16H15V11.24L16.62 8H17.88L15.88 12H19Z" />
                    </svg><p>Don’t Push Yourself To Fix Errors, But Look At The Existing Cases
                    </p>
                    <svg style="width:50px;height:50px; float: right" viewBox="0 0 24 24" class="">
                        <path fill="currentColor" d="M13 6V14H14.88L12.88 18H18.62L21 13.24V6M15 8H19V12.76L17.38 16H16.12L18.12 12H15M3 6V14H4.88L2.88 18H8.62L11 13.24V6M5 8H9V12.76L7.38 16H6.12L8.12 12H5Z" />
                    </svg>
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
    
@endsection