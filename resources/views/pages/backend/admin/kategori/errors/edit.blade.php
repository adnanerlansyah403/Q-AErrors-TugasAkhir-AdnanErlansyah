@extends("pages.backend.main_admin")

@section("title", "Edit Category - Errors")

@section("content_admin")
    
<div class="mt-4 mx-4">
    <h3 class="mt-10"><span class="text-blue-800 dark:text-white font-bold">Admin</span> / Kategori / Errors / Edit </h3>
    <h1 class="text-blue-800 dark:text-white text-4xl font-bold mt-2">Edit Category</h1>
</div>

@livewire("admin.form.kategori-form")

@endsection