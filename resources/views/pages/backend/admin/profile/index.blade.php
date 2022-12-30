@extends("pages.backend.main_admin")

@section("title", "Admin Profile - Errors")

@section("content_admin")


<div class="px-6">
  <h3 class="mt-10"><span class="text-blue-800 dark:text-white font-bold">Admin</span> / Profile </h3>
  <h1 class="text-blue-800 dark:text-white text-4xl font-bold mt-2" style="font-size: 28px;">Admin Profile</h1>
</div>

<form action="{{ route("admin.profile.update") }}" method="POST" enctype="multipart/form-data" class="p-6">
  @csrf
  <div class=" flex items-center gap-4 flex-wrap">
      <div class="flex flex-col w-[48%]">
        <label for="name" class="">Full Name</label>
        <input type="name" name="name" value="{{ $admin->name }}" id="name" placeholder="Full Name" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none">
      </div>

      <div class="flex flex-col w-[48%]">
        <label for="email" class="">Email</label>
        <input type="email" name="email" value="{{ $admin->email }}" id="email" placeholder="Email" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none">
      </div>

      <div class="flex flex-col w-[48%] mt-2">
        <label for="username" class="">Username</label>
        <input type="text" name="username" value="{{ $admin->username }}" id="username" placeholder="Username" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none">
      </div>

      <div class="flex flex-col w-[48%] mt-2">
          <label for="tel" class="">Password</label>
          <input type="password" name="password" id="password" placeholder="Password" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none">
      </div>

      <div class="flex flex-col w-[48%] mt-2">
        <label for="birthdate" class="">Birthdate</label>
        <input type="date" name="birthdate" value="{{ $admin->birthdate }}" id="birthdate" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none">
      </div>

      <div class="flex flex-col w-[48%] mt-2">
        <label for="gender" class="">Gender</label>
        <select name="gender" id="gender"
        class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none" style="border: 1px solid gray;">
          <option value="l" {{ $admin->gender == 'l' ? 'selected' : '' }}>Laki-Laki</option>
          <option value="p" {{ $admin->gender == 'p' ? 'selected' : '' }}>Perempuan</option>
        </select>
      </div>
      
      <div class="flex flex-col mt-2 w-full">
        <label for="bio" class="">Bio</label>
        <textarea name="bio" id="bio" rows="5" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 dark:text-gray-50 font-semibold focus:border-blue-500 focus:outline-none w-full" style="border: 1px solid gray;" placeholder="Your Bio">{{ $admin->bio }}</textarea>
    </div>
      
      <br><br>

    <button type="submit" class="md:w-32 bg-blue-600 dark:bg-gray-100 text-white dark:text-gray-800 font-bold py-3 px-6 rounded-lg hover:bg-blue-500 dark:hover:bg-gray-200 transition ease-in-out duration-300">Submit</button>
</form>

@endsection