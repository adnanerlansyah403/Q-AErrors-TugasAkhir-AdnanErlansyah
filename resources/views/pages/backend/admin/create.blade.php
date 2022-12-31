@extends("pages.backend.main_admin")

@section("title", "Admin Create - Errors")

@section("content_admin")
    
<div class="mt-4 mx-4">
    <h3 class="mt-10"><span class="text-blue-800 dark:text-white font-bold">Admin</span> / Create </h3>
    <h1 class="text-blue-800 dark:text-white text-lg font-bold mt-2">Admin Create</h1>

</div>

@livewire("admin.form.profile-form")


@endsection