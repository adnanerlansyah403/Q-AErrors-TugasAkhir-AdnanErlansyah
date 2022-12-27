@extends("pages.backend.main_admin")

@section("title", "Admin List - Errors")

@section("content_admin")
    
<div class="mt-4 mx-4">
    <h3 class="mt-10"><span class="text-blue-800 font-bold">Admin</span> / List </h3>
    <h1 class="text-blue-800 text-4xl font-bold mt-2">Admin List</h1>


    <div class="mt-10 mb-8">
        <a href="{{ route("admin.list.create") }}" class="bg-green-400 text-white hover:opacity-80 transition ease-in duration-200 p-2 rounded-lg">
            Create Admin
        </a>
    </div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">

      <div class="w-full overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Full Name</th>
              <th class="px-4 py-3">Email</th>
              <th class="px-4 py-3">Tanggal Lahir</th>
              <th class="px-4 py-3">Gender</th>
              <th class="px-4 py-3">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <div>
                    <p class="font-semibold">Hans Burger</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Fullstack Developer</p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">hans@gmail.com</td>
              <td class="px-4 py-3 text-sm">15-01-2021</td>
              <td class="px-4 py-3 text-xs">
                Laki-Laki
              </td>
              <td class="px-4 py-3 flex items-center gap-2">
                <a href="{{ route("admin.list.show") }}" class="text-white bg-blue-800 p-2 rounded-lg">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5ZM12 17C9.24 17 7 14.76 7 12C7 9.24 9.24 7 12 7C14.76 7 17 9.24 17 12C17 14.76 14.76 17 12 17ZM12 9C10.34 9 9 10.34 9 12C9 13.66 10.34 15 12 15C13.66 15 15 13.66 15 12C15 10.34 13.66 9 12 9Z" fill="currentColor"/>
                      </svg>                      
                </a>
                <button class="text-white bg-red-600 p-2 rounded-lg">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 19C6 20.1 6.9 21 8 21H16C17.1 21 18 20.1 18 19V7H6V19ZM8 9H16V19H8V9ZM15.5 4L14.5 3H9.5L8.5 4H5V6H19V4H15.5Z" fill="currentColor"/>
                      </svg>                      
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</div>

@endsection