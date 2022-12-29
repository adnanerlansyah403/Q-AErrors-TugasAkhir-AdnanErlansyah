@extends("main")

@section("title", "Create a Reviews")

@section("content_frontend")

<section class="section">
    <div class="container">

        <p class="text-[18px]"><span class="span font-bold">Review </span> / Create</p>
             

        @livewire("form.review-form")

    </div>
</section>

@endsection