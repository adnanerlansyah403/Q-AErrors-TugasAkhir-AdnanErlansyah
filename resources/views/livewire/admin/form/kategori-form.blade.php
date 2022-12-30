<form 
@if (!empty($this->category))
wire:submit.prevent="updateCategory"
@else
wire:submit.prevent="storeCategory" 
@endif
action="#" class="p-6">


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
    

    <div class=" flex items-center gap-4 flex-wrap">
        <div class="flex flex-col w-[48%]">
          <label for="name" class="">Name</label>
          <input type="name" wire:model="name" id="name" placeholder="Name" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none @error('name') border-red-primary @enderror">
          @error('name') 
              <div class="flex items-center gap-2 my-2">
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

        <div class="flex flex-col w-[48%]">
          <label for="description" class="">Description</label>
          <input type="text" wire:model="description" id="description" placeholder="Description" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none @error('description') border-red-primary @enderror">
          @error('description') 
              <div class="flex items-center gap-2 my-2">
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
        
        <br><br>

    </div>

    <button type="submit" class="md:w-32 bg-blue-600 dark:bg-gray-100 text-white dark:text-gray-800 font-bold py-3 px-6 rounded-lg mt-4 hover:bg-blue-500 dark:hover:bg-gray-200 transition ease-in-out duration-300">Submit</button>
</form>