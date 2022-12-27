@extends("pages.backend.main_admin")

@section("title", "List Kategori - Errors")

@section("content_admin")
    
<div class="mt-4 mx-6">
    <h3 class="mt-10"><span class="text-blue-800 font-bold">Admin</span> / Kategori / Errors </h3>
    <h1 class="text-blue-800 text-4xl font-bold mt-2">Kategori Errors</h1>


    <div class="mt-10 mb-8">
        <a href="{{ route("admin.kategori.errors.create") }}" class="bg-green-400 text-white hover:opacity-80 transition ease-in duration-200 p-2 rounded-lg">
            Create Kategori
        </a>
    </div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">

      <div class="w-full overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
              <th class="px-4 py-3">Name</th>
              <th class="px-4 py-3">Description</th>
              <th class="px-4 py-3">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
              <td class="px-4 py-3">
                <div class="flex items-center text-sm">
                  <div>
                    <p class="font-semibold">Javascript</p>
                  </div>
                </div>
              </td>
              <td class="px-4 py-3 text-sm">Mengandung bahasa pemograman javascript</td>
              <td class="px-4 py-3 flex items-center gap-2">
                <button class="text-white bg-yellow-400 p-2 rounded-lg">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 17.25V21H6.75L17.81 9.94L14.06 6.19L3 17.25ZM20.71 7.04C21.1 6.65 21.1 6 20.71 5.63L18.37 3.29C17.98 2.9 17.42 2.9 17.03 3.29L15.34 5L18.69 8.35L20.71 7.04Z" fill="currentColor"/>
                  </svg>                                     
                </button>
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


@endsection