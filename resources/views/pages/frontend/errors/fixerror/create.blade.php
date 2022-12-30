@extends("main")

@section("title", "Pecahkan Masalah")


@section("content_frontend")

<section class="section">
    <div class="container">
        <div class="flex items-center justify-between">
            <p class="text-[18px]"><span class="span font-bold">Cari Masalah</span> / Create an Answer</p>
            <a href="{{ route("errors.searcherror.index") }}" class="flex items-center gap-4 bg-red-primary p-4 rounded-lg text-white transition duration-200 w-max">
                Kembali
            </a>
        </div>

        <h1 class="text-lg font-black font-quick-sand mb-10">Share Pemecahan Masalahmu</h1>

        <div class="w-full mt-6 flex flex-wrap items-center gap-6">
            {{-- @livewire("form.question-form") --}}
            <form method="POST" action="{{ route("errors.fixerror.store") }}" class="card-item gap-6 px-6 py-6 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-full" enctype="multipart/form-data">
                @csrf


                <div class="flex items-center gap-10 flex-wrap">
            
                    <div class="mb-10 w-[48%]">
                        <label for="title" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">J</span>udul</label>
                        <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200">
                            <input type="text" name="title" id="title" class="" placeholder="Your title..." style="width: 100%">
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
                                <option value="{{ old('category', $category->id) }}" selected>{{ $category->name }}</option>
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
        
                    <div class="mb-10 w-full">
                        <label for="photo" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">Thumbnail</span> Masalah</label>
                        <div class="relative shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200">
                            <input type="file" name="photo" id="photo" value="{{ old('photo') }}" x-model="photo" class="pointer-events-none" placeholder="Your photo..." >
                            <span x-on:click="photo.click()" class="absolute cursor-pointer text-center flex items-center justify-center right-0 top-0 bottom-0 bg-red-primary text-white w-32 rounded-lg hover:text-slate-800">
                                Upload
                            </span>
                        </div>
                    </div>
            
                    <div class="-mt-10 w-full">
                        <label for="category" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">Q</span>uestion</label>
                        <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200 w-full">
                            <textarea name="description" id="description" rows="10" class="w-full"></textarea>
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
                            <p><span class="span">Share</span> Solusi</p>
                        </button>
                    </div>
            
                </div>
                
            
            
            </form>
        </div>
    </div>
</section>

@endsection