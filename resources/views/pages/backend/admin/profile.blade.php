@extends("pages.backend.admin.main_admin")

@section("title", "Admin Profile - Errors")

@section("content_admin")
    
<section class="section">
    <div class="container">

        <form class="p-6">
            <div class=" flex items-center gap-4 flex-wrap">
                <div class="flex flex-col w-[48%]">
                  <label for="name" class="">Full Name</label>
                  <input type="name" name="name" id="name" placeholder="Full Name" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none">
                </div>
      
                <div class="flex flex-col w-[48%]">
                  <label for="email" class="">Email</label>
                  <input type="email" name="email" id="email" placeholder="Email" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none">
                </div>
      
                <div class="flex flex-col w-[48%] mt-2 mb-6">
                  <label for="tel" class="">Number</label>
                  <input type="tel" name="tel" id="tel" placeholder="Telephone Number" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none">
                </div>

                <div class="flex flex-col w-[48%] mt-2 mb-6">
                    <label for="tel" class="">Password</label>
                    <input type="password" name="tel" id="tel" placeholder="Password" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none">
                  </div>
                
                <br><br>

            </div>
  
            <button type="submit" class="md:w-32 bg-blue-600 dark:bg-gray-100 text-white dark:text-gray-800 font-bold py-3 px-6 rounded-lg mt-4 hover:bg-blue-500 dark:hover:bg-gray-200 transition ease-in-out duration-300">Submit</button>
        </form>

    </div>
</section>

@endsection