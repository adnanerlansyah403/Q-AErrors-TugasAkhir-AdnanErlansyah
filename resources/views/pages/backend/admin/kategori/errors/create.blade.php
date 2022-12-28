@extends("pages.backend.main_admin")

@section("title", "Create Category - Errors")

@section("content_admin")
    
<div class="mt-4 mx-4">
    <h3 class="mt-10"><span class="text-blue-800 dark:text-white font-bold">Admin</span> / Kategori / Errors / Create </h3>
    <h1 class="text-blue-800 dark:text-white text-4xl font-bold mt-2">Create Category</h1>
</div>

<form class="p-6">
    <div class=" flex items-center gap-4 flex-wrap">
        <div class="flex flex-col w-[48%]">
          <label for="name" class="">Name</label>
          <input type="name" name="name" id="name" placeholder="Name" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none">
        </div>

        <div class="flex flex-col w-[48%]">
          <label for="description" class="">Description</label>
          <input type="text" name="description" id="description" placeholder="Description" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none">
        </div>
        
        <br><br>

    </div>

    <button type="submit" class="md:w-32 bg-blue-600 dark:bg-gray-100 text-white dark:text-gray-800 font-bold py-3 px-6 rounded-lg mt-4 hover:bg-blue-500 dark:hover:bg-gray-200 transition ease-in-out duration-300">Submit</button>
</form>

@endsection