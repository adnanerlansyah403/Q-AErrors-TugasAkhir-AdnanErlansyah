<div>
    <form wire:submit.prevent="storeComment" action="#" class="mt-10">
        <p class="text-md mb-10" wire:change="$refresh">Jawaban <span class="span">({{ $countComments }})</span></p>
        

        @if(session()->has('scs'))
            <div class="alert alert-success active" x-ref="alertComponent">
                <a id="dismissComponent" x-on:click="$refs.alertComponent.classList.remove('active')" class="cursor-pointer font-semibold text-white">
                    Dismiss
                </a>  
                <div class="flex items-center justify-between text-white mt-4">
                    <div class="title flex items-center gap-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z" fill="currentColor"/>
                            </svg>
                        Successfully
                    </div>
                </div>
                <p class="mt-2 text-xs text-white">
                    {{ session()->get('scs') }}
                </p>        
            
                {{-- <script type="text/javascript">
            
                    let aleretComponent = document.querySelector(".aleretComponent");
                    let dismissComponent = document.getElementById("dismissComponent");
            
                    dismissComponent.addEventListener("click", function(event) {
                        aleretComponent.classList.remove("active");
                    })
            
                </script> --}}
            </div>
        @endif
        
        <div class="mb-6 w-full" id="comment">
            <label for="comment" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">C</span>omment</label>
            <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary @error('comment') border outline-red-primary @enderror transition duration-200">
                <textarea wire:model="comment" wire:key="comment" id="comment" rows="10" placeholder="Your comment..." class="text-md w-full"></textarea>
            </div>
            @error('comment') 
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

        <button type="submit" class="bg-red-primary p-4 rounded-lg text-white transition duration-200">
            <div class="flex items-center gap-2" wire:loading.remove wire:target="storeComment">
                Send
                <svg width="18" height="18" class="group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.01 21L23 12 2.01 3 2 10L17 12 2 14V21Z" fill="currentColor"/>
                </svg>
            </div>
            <div wire:loading wire:target="storeComment">
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                  Processing...
            </div>
        </button>

    </form>
</div>
