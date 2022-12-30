@extends("pages.backend.main_admin")

@section("title", "Details of Admin")

@section("content_admin")
    
<div class="mx-6">

    <h3 class="mt-10"><span class="text-blue-800 dark:text-white font-bold">Admin</span> / Details </h3>
    <h1 class="text-blue-800 dark:text-white text-lg font-bold mt-2 mb-10">Details Admin</h1>

    <a href="{{ route("admin.list.index") }}" class="bg-blue-800 dark:bg-gray-800 text-white p-4 rounded-lg">Kembali</a>

</div>

<div class="p-6">

    <div class="bg-gray-200 dark:bg-gray-600 font-sans h-screen w-full flex flex-row justify-center items-center">
      <div class="card w-[500px] mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-xl hover:shadow">
         <img class="w-32 mx-auto rounded-full -mt-20 border-8 border-white" src="https://avatars.githubusercontent.com/u/67946056?v=4" alt="">
         {{-- <img class="w-32 mx-auto rounded-full -mt-20 border-8 border-white" src="{{ asset("assets/images/avatarwomanbg.png") }}" alt=""> --}}
         
         <div class="text-center mt-2 text-3xl font-medium">{{ $admin->name }}</div>
         <div class="text-center mt-2 font-light text-sm"></div>
         <div class="text-center font-normal text-md">{{ $admin->email }}</div>
         <div class="px-6 text-center mt-2 font-light text-sm">
           <p>
             {{ $admin->profession ? $admin->profession : 'No Profession' }}
           </p>
         </div>
         <hr class="mt-8">
         <div class="flex items-center justify-center p-4">
           <div class="text-center">
             <span class="font-bold">Tanggal Lahir : </span> 27-03-2003
           </div>
         </div>
      </div>
    </div>
  </div>

</div>

@endsection