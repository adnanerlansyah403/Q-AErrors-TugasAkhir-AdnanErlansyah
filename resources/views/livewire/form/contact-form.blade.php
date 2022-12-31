<div class="flex-1">
    <form action="#" wire:submit.prevent="storeContact">


        @if ($this->exception != null) 
        {{-- @dd($this->exception) --}}
        @component("components.alert", [
            "type" => "alert-danger",
            "icon" => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41Z" fill="currentColor"/>
                </svg>
                ',
            "status" => "active",
            "message" => [
                ["error" => "Too many requests for contact!, Please wait another $this->exception seconds to try again!"],
            ]
        ])
        @endcomponent
        @endif


        <div class="mb-10">
            <label for="name" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">N</span>ame</label>
            <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200 @error('name') border border-red-primary @enderror">
                <input type="text" wire:model="name" id="name" class="" value="{{ old('name') }}" class="" placeholder="Your name..." class="w-full" style="width: 100%;">
            </div>
            @error('name') 
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

        <div class="mb-10">
            <label for="email" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">E</span>mail</label>
            <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200 @error('email') border border-red-primary @enderror">
                <input type="email" wire:model="email" id="email" class="" value="{{ old('email') }}" class="" placeholder="Your email..." class="w-full" style="width: 100%;">
            </div>
            @error('email') 
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

        <div class="mb-10">
            <label for="message" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">M</span>essage</label>
            <textarea wire:model="message" id="" class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:outline outline-1  @error('message') border outline-red-primary @enderror transition duration-200 w-full" style="width: 100%;" rows="10" placeholder="Your message..."></textarea>
            @error('message') 
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

        <div class="flex justify-center items-center">
            <button type="submit" class="bg-red-primary p-4 rounded-lg text-white transition duration-200">
                <div class="flex items-center gap-2" wire:loading.remove wire:target="storeContact">
                    Send
                    <svg width="18" height="18" class="group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.01 21L23 12 2.01 3 2 10L17 12 2 14V21Z" fill="currentColor"/>
                    </svg>
                </div>
                <div wire:loading.flex wire:target="storeContact">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                      </svg>
                      Processing...
                </div>
            </button>
        </div>

    </form>
</div>
