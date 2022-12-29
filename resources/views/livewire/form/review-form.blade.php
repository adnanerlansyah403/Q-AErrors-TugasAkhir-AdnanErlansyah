<div class="w-full mt-6 flex flex-wrap items-center gap-6">

    @if ($this->exception > 1) 
    @component("components.alert", [
        "type" => "alert-danger",
        "icon" => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41Z" fill="currentColor"/>
            </svg>
            ',
        "status" => $this->exception > 1 ? "active" : "",
        "message" => [
            ["error" => "Too many requests for review!, Please wait another $this->exception seconds to try again!"],
        ]
    ])
    @endcomponent
    @endif

    <form wire:submit.prevent="storeReview" action="#" class="card-item gap-6 px-6 py-6 rounded-lg shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_1px_3px_1px] w-full">

        <div class="">

            <div class="w-full">
                <label for="category" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">K</span>omentar</label>
                <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary @error('comment') border border-red-primary @enderror transition duration-200 w-full mb-4">
                    <textarea wire:model="comment" rows="10" class="w-full"></textarea>
                </div>
                @error('comment') 
                    <div class="flex items-center gap-2">
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


            <div class="mt-10 mb-10 w-[48%]">
                <label for="title" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">R</span>ating</label>
                <div class="flex items-center gap-2 relative -left-">
                    <div class="rating">
                        <input type='radio' hidden name='rating' wire:model='rating' value="5" id='rating-opt5' data-idx='0'>	
                        <label for='rating-opt5'><span>Amazing</span></label>
                   
                        <input type='radio' hidden name='rating' wire:model='rating' value="4" id='rating-opt4' data-idx='1'>
                        <label for='rating-opt4'><span>Very Good</span></label>
                   
                        <input type='radio' hidden name='rating' wire:model='rating' value="3" id='rating-opt3' data-idx='2'>
                        <label for='rating-opt3'><span>Good</label>
                   
                        <input type='radio' hidden name='rating' wire:model='rating' value="2" id='rating-opt2' data-idx='3'>
                        <label for='rating-opt2'><span>Not Bad</span></label>
                   
                        <input type='radio' hidden name='rating' wire:model='rating' value="1" id='rating-opt1' data-idx='4'>
                        <label for='rating-opt1'><span>So Bad</span></label>
                      </div>
                </div>

                @error('rating') 
                    <div class="flex items-center gap-2">
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
                <button type="submit" class="w-max flex items-center gap-2 font-bold outline outline-1 outline-red-primary px-6 py-4 rounded-lg hover:bg-slate-800 hover:text-white transition duration-200 ease-in-out hover:outline-none group">
                    <span class="span">Kirim</span> 
                    <svg width="18" height="18" class="group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.01 21L23 12 2.01 3 2 10L17 12 2 14V21Z" fill="currentColor"/>
                    </svg>
                </button>
            </div>

        </div>


    </form>
</div>
