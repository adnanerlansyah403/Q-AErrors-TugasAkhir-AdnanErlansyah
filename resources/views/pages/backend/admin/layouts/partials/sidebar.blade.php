@php
  
  $countAnswer = App\Models\Answer::query()
  ->where('created_at', '>=', \Carbon\Carbon::now()->subHours())
  ->where('created_at', '<', \Carbon\Carbon::now())
  ->count();
  $countReview = App\Models\Review::query()
  ->where('created_at', '>=', \Carbon\Carbon::now()->subHours())
  ->where('created_at', '<', \Carbon\Carbon::now())
  ->count();
  $countContact = App\Models\Contact::query()
  ->where('created_at', '>=', \Carbon\Carbon::now()->subHours())
  ->where('created_at', '<', \Carbon\Carbon::now())
  ->count();

  $totalData = $countAnswer + $countReview + $countContact;

@endphp

<div class="fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-blue-900 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
  <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
    <ul class="flex flex-col py-4 space-y-1">
      <li class="px-5 hidden md:block">
        <div class="flex flex-row items-center h-8">
          <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>
        </div>
      </li>
      <li>
        <a href="{{ route("admin.dashboard") }}" class="{{ $currentRoute == 'admin.dashboard' ? 'bg-blue-800 dark:bg-gray-600 text-white-600 text-white-800 border-l-4 border-transparent border-blue-500 dark:border-gray-80' : '' }} relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
          <span class="inline-flex justify-center items-center ml-4">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="{{ route("admin.kategori.errors.index") }}" class="{{ $currentRoute == 'admin.kategori.errors.index' ? 'bg-blue-800 dark:bg-gray-600 text-white-600 text-white-800 border-l-4 border-transparent border-blue-500 dark:border-gray-80' : '' }} relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
          <span class="inline-flex justify-center items-center ml-4">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">Kategori</span>
        </a>
      </li>
      <li>
        <a href="{{ route("admin.notification.index") }}" class="{{ $currentRoute == 'admin.notification.index' ? 'bg-blue-800 dark:bg-gray-600 text-white-600 text-white-800 border-l-4 border-transparent border-blue-500 dark:border-gray-80' : '' }} relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
          <span class="inline-flex justify-center items-center ml-4">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">Notifications</span>
          <span class="hidden relative md:block w-6 h-6 leading-5 text-center py-0.5 ml-auto font-medium tracking-wide text-red-500 bg-red-50 rounded-full">
            {{ $totalData }}
          </span>
        </a>
      </li>
      <li class="px-5 hidden md:block">
        <div class="flex flex-row items-center mt-5 h-8">
          <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Settings</div>
        </div>
      </li>
      <li>
        <a href="{{ route("admin.profile.index") }}" class="{{ $currentRoute == 'admin.profile.index' ? 'bg-blue-800 dark:bg-gray-600 text-white-600 text-white-800 border-l-4 border-transparent border-blue-500 dark:border-gray-80' : '' }} relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
          <span class="inline-flex justify-center items-center ml-4">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
          </span>
          <span class="ml-2 text-sm tracking-wide truncate">Profile</span>
        </a>
      </li>

      @if (Auth::user()->role_id == 3)
        <li>
          <a href="{{ route("admin.list.index") }}" class="{{ $currentRoute == 'admin.list.index' ? 'bg-blue-800 dark:bg-gray-600 text-white-600 text-white-800 border-l-4 border-transparent border-blue-500 dark:border-gray-80' : '' }} relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
            <span class="inline-flex justify-center items-center ml-4">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" fill="currentColor"/>
              </svg>
              
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Admin</span>
          </a>
        </li>
      @endif

    </ul>
    <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">Copyright @2022</p>
  </div>
</div>