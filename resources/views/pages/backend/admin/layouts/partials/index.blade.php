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

  {{-- modal super admin --}}
  
  @livewire("admin.modals.todolist-modal",
  [
    "modalName" => "modalTaskSuperAdmin",
    "user" => "superadmin",
  ])

</div>

@endsection