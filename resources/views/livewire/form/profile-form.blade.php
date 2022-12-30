<form wire:submit.prevent="saveProfile" action="#" class="w-full"
x-data="{
    passwordVisible: false,
    eyeOffIcon: 'eye-off-outline',
    eyeIcon: 'eye-outline',
}">
    
    @if(session()->has('success'))
        <div class="alert alert-success active" x-ref="alert">
            <a id="dismiss" class="cursor-pointer font-semibold text-white">
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
                {{ session()->get('success') }}
            </p>        
        
            <script type="text/javascript">
        
                let alert = document.querySelector(".alert");
                let dismiss = document.getElementById("dismiss");
        
                dismiss.addEventListener("click", function(event) {
                    alert.classList.remove("active");
                })
        
            </script>
        </div>
    @endif

    <div class="flex items-center gap-10 flex-wrap">
        <div class="mb-10 w-[48%]">
            <label for="email" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">E</span>mail</label>
            <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary @error('email') border border-red-primary @enderror transition duration-200">
                <input type="email" wire:model="email" id="email" class="w-full" value="{{ old('email') }}" class="" placeholder="Your email..." >
            </div>
            @error('email') 
                <div class="flex items-center gap-2 translate-y-2">
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
            <label for="password" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">P</span>assword</label>
            <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary @error('password') border border-red-primary @enderror transition duration-200 flex items-center w-full relative">
                <input x-bind:type="passwordVisible ? 'text' : 'password'" wire:model="password" id="password" value="{{ old('password') }}" class="" placeholder="Your password..." style="width: 90%">
                <a class="cursor-pointer text-md flex-1 absolute right-4 top-[55%] -translate-y-1/2" x-on:click="passwordVisible = !passwordVisible">
                    <ion-icon x-bind:name="passwordVisible ? 'eye-off-outline' : 'eye-outline'" style="visibility: visible;"></ion-icon>
                </a>
            </div>
            @error('password') 
                <div class="flex items-center gap-2 translate-y-2">
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
            <label for="name" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">Full</span> Name</label>
            <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary @error('name') border border-red-primary @enderror transition duration-200">
                <input type="text" wire:model="name" id="name" class="w-full" value="{{ old('name') }}" class="" placeholder="Your name..." >
            </div>
            @error('name') 
                <div class="flex items-center gap-2 translate-y-2">
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
            <label for="name" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">U</span>sername</label>
            <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border @error('username') border border-red-primary @enderror transition duration-200">
                <input type="text" wire:model="username" id="username" class="w-full" value="{{ old('username') }}" placeholder="Your username..." >
            </div>
            @error('username') 
                <div class="flex items-center gap-2 translate-y-2">
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
            <label for="name" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">B</span>irthdate</label>
            <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200">
                <input type="date" wire:model="birthdate" id="birthdate" class="" class="w-full" placeholder="Your birthdate..." >
            </div>
            @error('birthdate') 
                <div class="flex items-center gap-2 translate-y-2">
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
            <label for="gender" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">G</span>ender</label>
            <select class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200 w-full" wire:model="gender" id="gender">
                <option value="{{ old('gender', "l") }}" {{ $this->gender == 'l' ? 'selected' : '' }}>Laki-Laki</option>
                <option value="{{ old('gender', "p") }}" {{ $this->gender == 'p' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('gender') 
                <div class="flex items-center gap-2 translate-y-2">
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
            <label for="photo" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">Photo</span> Profile</label>
            <div class="relative shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200">
                <input type="file" wire:model="photo" id="photo" value="{{ old('photo') }}" x-model="photo" class="pointer-events-none" placeholder="Your photo..." >
                <span x-on:click="photo.click()" class="absolute cursor-pointer text-center flex items-center justify-center right-0 top-0 bottom-0 bg-red-primary text-white w-32 rounded-lg hover:text-slate-800">
                    Upload
                </span>
            </div>
        </div>
                

        <div class="mb-10 w-[48%]">
            <label for="gender" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">P</span>rofession</label>
            <select class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200 w-full" wire:model="profession" id="profession">
                <option value="{{ old('profession', "frontend") }}" {{ $this->profession == 'frontend' ? 'selected' : '' }}>Front-End</option>
                <option value="{{ old('profession', "freelancer") }}" {{ $this->profession == 'freelancer' ? 'selected' : '' }}>Freelancer</option>
                <option value="{{ old('profession', "backend") }}" {{ $this->profession == 'backend' ? 'selected' : '' }}>Backend Developer</option>
            </select>
            @error('profession') 
                <div class="flex items-center gap-2 translate-y-2">
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
                
        <div class="-mt-4 mb-10 w-full">
            <label for="address" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">A</span>lamat</label>
            <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200">
                <textarea wire:model="address" id="address" class="w-full" rows="10"></textarea>
            </div>
            @error('address') 
                <div class="flex items-center gap-2 translate-y-2">
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

        <div class="-mt-4 mb-10 w-full">
            <label for="bio" class="block text-md font-medium leading-5 text-slate-700 justify-self-start mb-4"><span class="span">B</span>io</label>
            <div class="shadow-[rgba(60,_64,_67,_0.3)_0px_1px_2px_0px,_rgba(60,_64,_67,_0.15)_0px_2px_6px_2px] p-4 rounded-lg active:border border-red-primary transition duration-200">
                <textarea wire:model="bio" id="bio" class="w-full" rows="10"></textarea>
            </div>
            @error('bio') 
                <div class="flex items-center gap-2 translate-y-2">
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
    </div>


    <div class="flex justify-center items-center">
        <button type="submit" class="flex items-center gap-4 bg-red-primary p-4 rounded-lg text-white transition duration-200">
            Update
        </button>
    </div>
</form>