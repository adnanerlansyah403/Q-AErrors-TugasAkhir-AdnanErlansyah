@extends("main")

@section("title", "Create a Question")

@section("content_frontend")

@push("styles")
    <style>
        .tox-statusbar__branding {
            display: none;
        }
    </style>
@endpush

<section class="section">
    <div class="container">
        <p class="text-[18px]"><span class="span font-bold">Cari Masalah</span> / Create a Question</p>

        <h1 class="text-lg font-black font-quick-sand mb-10">Tanyakan Masalahmu</h1>


        <div class="w-full mt-6 flex flex-wrap items-center gap-6">
            <form action="#" class="card-item gap-6 px-6 py-6 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-full">
                @csrf

                <div class="flex items-center gap-10 flex-wrap">

                    <div class="mb-10 w-[48%]">
                        <label for="title" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">J</span>udul</label>
                        <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200">
                            <input type="text" name="title" id="title" class="" value="{{ old('title') }}" class="" placeholder="Your title..." >
                        </div>
                    </div>

                    <div class="mb-10 w-[48%]">
                        <label for="category" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">C</span>ategory</label>
                        <select class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200 w-full" id="category">
                            <option value="{{ old('category', "javascript") }}">Javascript</option>
                            <option value="{{ old('category', "php") }}">PHP</option>
                            <option value="{{ old('category', "html") }}">HTML</option>
                        </select>
                    </div>

                    <div class="-mt-10 w-full">
                        <label for="category" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">Q</span>uestion</label>
                        <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200 w-full">
                            <textarea name="address" id="address" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="mb-2">
                        <button type="submit" href="#notanswer" class="w-max flex items-center gap-4 font-bold outline outline-1 outline-red-primary px-6 py-4 rounded-lg hover:bg-slate-800 hover:text-white transition duration-200 hover:outline-none">
                            <p><span class="span">Buat</span> Masalah</p>
                        </button>
                    </div>

                </div>


            </form>
        </div>
    </div>
</section>
    
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>

@endsection