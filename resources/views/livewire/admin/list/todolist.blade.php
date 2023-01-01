<div class="rounded bg-blue-600 dark:bg-gray-800 p-3 flex-auto" wire:key={{ $i }}>
  
  @php
    
    $modalName = "";
    if($types[$i]->slug == 'superadmin') {
      $modalName =  'modalTaskSuperAdmin';
    } else if($types[$i]->slug == 'admin') {
      $modalName =  'modalTaskAdmin';
    } else {
      $modalName = 'modalTaskUser';
    }

  @endphp
  
  @if(session()->has('successTodolist'))
    <div class="alert alert-success active" x-ref="alertTodolist">
        <a id="dismissTodolist" x-on:click="$refs.alertTodolist.classList.remove('active')" class="cursor-pointer font-semibold text-white">
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
            {{ session()->get('successTodolist') }}
        </p>        
    
    </div>
  @endif

    <div class="flex items-center justify-between py-1 text-white dark:text-white">
      <h3 class="text-sm font-semibold">Todolists in 
         <b class="uppercase">{{ $types[$i]->name }}</b>
       </h3>
      @if (Auth::user()->role_id == 3)
        <button @click="
        {{ $modalName }} = true;
        {{-- console.log('test') --}}
        "
        {{-- wire:click="resetModalTodolist({{ $modalName }})" --}}
        class="bg-white text-gray-800 p-2 rounded-lg font-bold text-sm">Add</button>
      @endif
    </div>
    <div class="text-sm text-white dark:text-gray-50 mt-2">
      @forelse ($todolists->where('role_id', $types[$i]->id) as $todolist)
        <div class="flex items-center justify-between bg-white dark:bg-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 p-2 rounded mt-1 border-b border-gray-100 dark:border-gray-900 cursor-pointer" wire:key={{ 'todo-'.$todolist->id }}>
          {{ $todolist->task }}
          @if (Auth::user()->role_id == 3)
            <div>
              {{-- <button wire:click="editTodolist({{ $todolist }})" @click=`{{ $modalName }} = !{{ $modalName }}` class="text-white bg-yellow-400 p-1 rounded-lg">
                <a href="#">
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 17.25V21H6.75L17.81 9.94L14.06 6.19L3 17.25ZM20.71 7.04C21.1 6.65 21.1 6 20.71 5.63L18.37 3.29C17.98 2.9 17.42 2.9 17.03 3.29L15.34 5L18.69 8.35L20.71 7.04Z" fill="currentColor"/>
                  </svg>   
                </a>   
              </button> --}}
              <button class="text-white bg-red-600 p-1 rounded-lg">
                <a href="#" wire:click="deleteTodolist({{ $todolist }})">
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M6 19C6 20.1 6.9 21 8 21H16C17.1 21 18 20.1 18 19V7H6V19ZM8 9H16V19H8V9ZM15.5 4L14.5 3H9.5L8.5 4H5V6H19V4H15.5Z" fill="currentColor"/>
                  </svg>                      
                </a>
              </button>
            </div>
          @endif
        </div>
      @empty

        <h1 class="text-white text-lg">No Todolist</h1>

      @endforelse
    </div>
</div>