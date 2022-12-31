@extends("pages.backend.main_admin")

@section("content_admin")

<div x-data="{
  modalTaskUser: false,
  modalTaskAdmin: false,
  modalTaskSuperAdmin: false,
}">
  <!-- Statistics Cards -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
      <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
        <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
            <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
        </div>
        <div class="text-right">
          <p class="text-2xl">{{ $countQuestion }}</p>
          <p>Questions</p>
        </div>
      </div>
      <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
        <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
            <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                <path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
            </svg>                  
        </div>
        <div class="text-right">
          <p class="text-2xl">{{ $countAnswer }}</p>
          <p>Answers</p>
        </div>
      </div>
      <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
        <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
            <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </div>
        <div class="text-right">
          <p class="text-2xl">{{ $countUser }}</p>
          <p>Users</p>
        </div>
      </div>
      <div class="bg-blue-500 dark:bg-gray-800 shadow-lg rounded-md flex items-center justify-between p-3 border-b-4 border-blue-600 dark:border-gray-600 text-white font-medium group">
        <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
            <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="stroke-current text-blue-800 dark:text-gray-800 transform transition-transform duration-500 ease-in-out">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
              </svg>
              
              
        </div>
        <div class="text-right">
          <p class="text-2xl">{{ $countReview }}</p>
          <p>Reviews</p>
        </div>
      </div>

  </div>
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 p-4 gap-4 text-black dark:text-white">
     
      <div class="md:col-span-2 xl:col-span-3">
        <h3 class="text-lg font-semibold">Todolist summaries of All User</h3>
      </div>

      @for ($i = 0; $i < count($typesTodolist); $i++)
        @livewire("admin.list.todolist", [
          "i" => $i,
          "todolists" => $todolists,
          "types" => $typesTodolist,
        ], key('item-'. $i))
      @endfor
      
  </div>
  <!-- ./Statistics Cards -->

  {{-- Modals --}}

  {{-- modal user --}}
  @livewire("admin.modals.todolist-modal", 
    [
      "modalName" => "modalTaskUser",
      "user" => "user"
    ]
  )
  
  {{-- modal admin --}}
  @livewire("admin.modals.todolist-modal", 
  [
    "modalName" => "modalTaskAdmin",
    "user" => "admin"
  ])
  {{-- <div x-show="modalTaskAdmin" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
        <div x-cloak @click="modalTaskAdmin = false" x-show="modalTaskAdmin" 
            x-transition:enter="transition ease-out duration-300 transform"
            x-transition:enter-start="opacity-0" 
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200 transform"
            x-transition:leave-start="opacity-100" 
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
        ></div>

        <div x-cloak x-show="modalTaskAdmin" 
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

                <button @click="modalTaskAdmin = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>


            <p class="mt-2 text-sm text-gray-500 ">
              Add the todolist for the <b>ADMIN</b> 
            </p>

            <form class="mt-5">
                <div>
                    <label for="user name" class="block text-sm text-gray-700 capitalize dark:text-gray-400">Todolist Name</label>
                    <input placeholder="Todolist Name" type="text" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                </div>

                <div class="flex justify-end mt-6">
                    <button type="button" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                        Add Todolist
                    </button>
                </div>
            </form>
        </div>
    </div>
  </div> --}}

  {{-- modal super admin --}}
  @livewire("admin.modals.todolist-modal",
  [
    "modalName" => "modalTaskSuperAdmin",
    "user" => "superadmin",
  ])
  {{-- <div x-show="modalTaskSuperAdmin" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
      <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
          <div x-cloak @click="modalTaskSuperAdmin = false" x-show="modalTaskSuperAdmin" 
              x-transition:enter="transition ease-out duration-300 transform"
              x-transition:enter-start="opacity-0" 
              x-transition:enter-end="opacity-100"
              x-transition:leave="transition ease-in duration-200 transform"
              x-transition:leave-start="opacity-100" 
              x-transition:leave-end="opacity-0"
              class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
          ></div>

          <div x-cloak x-show="modalTaskSuperAdmin" 
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

                  <button @click="modalTaskSuperAdmin = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                  </button>
              </div>

              <p class="mt-2 text-sm text-gray-500 ">
                Add the todolist for the <b>SUPER ADMIN</b> 
              </p>

              <form class="mt-5">
                  <div>
                      <label for="user name" class="block text-sm text-gray-700 capitalize dark:text-gray-400">Todolist Name</label>
                      <input placeholder="Todolist Name" type="text" class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                  </div>

                  <div class="flex justify-end mt-6">
                      <button type="button" class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                          Add Todolist
                      </button>
                  </div>
              </form>
          </div>
      </div>
  </div> --}}

</div>

@endsection