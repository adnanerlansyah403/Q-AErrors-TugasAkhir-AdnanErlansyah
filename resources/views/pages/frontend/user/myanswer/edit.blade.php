@extends("main")

@section("title", "Edit My Answer")


@section("content_frontend")


<section class="section">
    <div class="container">
        <div class="flex items-center justify-between">
            <p class="text-[18px]"><span class="span font-bold">Pecahkan Masalah</span> / Edit an Answer</p>
            <a href="{{ route("users.myanswer.index") }}" class="flex items-center gap-4 bg-red-primary p-4 rounded-lg text-white transition duration-200 w-max">
                Kembali
            </a>
        </div>

        <h1 class="text-lg font-black font-quick-sand mb-10">Ubah Jawabanmu</h1>


        <div class="w-full mt-6 flex flex-wrap items-center gap-6">
            {{-- @livewire("form.question-form") --}}
            <form method="POST" action="{{ route("users.myanswer.update", $answer) }}" class="card-item gap-6 px-6 py-6 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-full">
                @csrf


                <div class="flex items-center gap-10 flex-wrap">
            
                    <div class="mb-10 w-[48%]">
                        <label for="title" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">J</span>udul</label>
                        <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200">
                            <input type="text" name="title" id="title" class="" placeholder="Your title..." value="{{ $answer->title }}" style="width: 100%">
                        </div>
                        @error('title') 
                            <div class="flex items-center gap-2 mt-2">
                                <svg class="h-6 w-6 text-red-primary cursor-pointer"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-red-400 font-semibold">{{ $message }}</span>
                            </div> 
                        @enderror
                    </div>
            
                    <div class="mb-10 w-[48%]">
                        <label for="category" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">C</span>ategory</label>
                        <select class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200 w-full" name="category" id="category">
                            <option selected>-- Choose Category --</option>
                            @forelse ($categories as $category)
                                <option value="{{ old('category', $category->id) }}" {{ $category->id == $answer->category_id ? "selected" : "" }}>{{ $category->name }}</option>
                            @empty
                                
                            @endforelse
                        </select>
                        @error('category') 
                            <div class="flex items-center gap-2 mt-2">
                                <svg class="h-6 w-6 text-red-primary cursor-pointer"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-red-400 font-semibold">{{ $message }}</span>
                            </div> 
                        @enderror
                    </div>
            
                    <div class="-mt-10 w-full">
                        <label for="category" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">A</span>nswer</label>
                        <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200 w-full">
                            <textarea name="description" id="description" rows="10" class="w-full">{{ $answer->description_editor }}</textarea>
                        </div>
                        @error('description') 
                            <div class="flex items-center gap-2 mt-2">
                                <svg class="h-6 w-6 text-red-primary cursor-pointer"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-red-400 font-semibold">{{ $message }}</span>
                            </div> 
                        @enderror
                    </div>
            
                    <div class="mb-2">
                        <button type="submit" href="#notanswer" class="w-max flex items-center gap-4 font-bold outline outline-1 outline-red-primary px-6 py-4 rounded-lg hover:bg-slate-800 hover:text-white transition duration-200 hover:outline-none">
                            <ion-icon name="save-outline" class="text-md"></ion-icon>
                            <p>
                                <span class="span">Update</span> Masalah
                            </p>
                        </button>
                    </div>
            
                </div>
                
            
            
            </form>
        </div>
    </div>
</section>
@endsection