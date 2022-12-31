<div x-show="{{ $modalName }}" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    
    @if(session()->has('successModal' . $user))
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
                {{ session()->get('successModal' . $user) }}
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

    <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
        <div x-cloak @click="{{ $modalName }} = false" x-show="{{ $modalName }}" 
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0" 
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100" 
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
        ></div>

        <div x-cloak x-show="{{ $modalName }}" 
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
        >
            <div class="flex items-center justify-between space-x-4">
                <h1 class="text-xl font-medium text-gray-800 ">Add some todolist</h1>

                <button @click="
                {{ $modalName }} = !{{ $modalName }}
                console.log('test')" 
                {{-- wire:click="resetModal" --}}
                class="text-gray-600 focus:outline-none hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>

            <p class="mt-2 text-sm text-gray-500 ">
                Add the todolist for the <b class="uppercase">{{ $user }}</b> 
            </p>

            <form 
                @if ($todolist != null)
                    wire:submit.prevent="updateTodolist" 
                @else
                    wire:submit.prevent="submit" 
                @endif
                action="#" 
                class="mt-5"
            >
                <div>
                    <label for="task" class="block text-[18px] text-gray-700 capitalize dark:text-gray-400">Todolist Name</label>
                    <input wire:model="task" name="task" id="task" placeholder="Todolist Name" type="text" class="text-sm block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                    @error('task') 
                    <div class="flex items-center gap-2 translate-y-2">
                        <svg class="h-4 w-4 text-red-primary cursor-pointer"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-red-400 font-semibold text-[14px]">{{ $message }}</span>
                    </div> 
                @enderror
                </div>
                <div class="mt-4">
                    <label for="user name" class="block text-[18px] text-gray-700 capitalize dark:text-gray-400">Todolist Description</label>
                    <input wire:model="description" name="description" id="description" placeholder="Todolist Description" type="text" class="text-sm block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                    @error('description') 
                    <div class="flex items-center gap-2 translate-y-2">
                        <svg class="h-4 w-4 text-red-primary cursor-pointer"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-red-400 font-semibold text-[14px]">{{ $message }}</span>
                    </div> 
                @enderror
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit" class="flex items-center gap-2 px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                        Save Todolist
                        {{-- <ion-icon name="save-outline" class="text-white" style="visibility: visible;"></ion-icon> --}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>