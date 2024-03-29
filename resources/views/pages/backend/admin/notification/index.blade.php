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

@extends("pages.backend.main_admin")

@section("title", "Notificaiton Admin - Errors")

@section("content_admin")

<link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />

    <div class="mx-6">
        <h3 class="mt-10"><span class="text-blue-800 font-bold dark:text-white">Admin</span> / Notification </h3>
        <h1 class="text-blue-800 text-4xl font-bold mt-2 dark:text-white">Notification</h1>    
    </div>

    <!-- This is an example component -->
    <div class="p-6 mx-auto">
        
        <div class="border-b border-gray-200 dark:border-gray-700 mb-4">
            <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="flex items-center gap-2 text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-white dark:hover:text-gray-300 active" id="sharefix-tab" data-tabs-target="#sharefix" type="button" role="tab" aria-controls="sharefix" aria-selected="true">
                      Share Fix Masalah
                      <span class="bg-blue-800 w-5 h-5 text-center leading-5 rounded-full text-white">{{ $countAnswer }}</span>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="flex items-center gap-2 text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" id="carimasalah-tab" data-tabs-target="#carimasalah" type="button" role="tab" aria-controls="carimasalah" aria-selected="false">
                      Reviews
                      <span class="bg-blue-800 w-5 h-5 text-center leading-5 rounded-full text-white">{{ $countReview }}</span>
                    </button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="flex items-center gap-2 text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" id="contact-tab" data-tabs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                      Contacts
                      <span class="bg-blue-800 w-5 h-5 text-center leading-5 rounded-full text-white">{{ $countContact }}</span>
                    </button>
                </li>
            </ul>
        </div>
        <div id="myTabContent">

            <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800" id="sharefix" role="tabpanel" aria-labelledby="sharefix-tab">
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
            
                    <div class="w-full overflow-x-auto">
                      <table class="w-full">
                        <thead>
                          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Masalah</th>
                            <th class="px-4 py-3">Jawaban Masalah</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Actions</th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                          @forelse ($answers as $a)
                            <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                              <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                  <div>
                                    <p class="font-semibold">{{ $a->user->name }}</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">{{ $a->user->profession }}</p>
                                  </div>
                                </div>
                              </td>
                              <td class="px-4 py-3 text-sm">{{ $a->user->email }}</td>
                              <td class="px-4 py-3 text-sm">{{ $a->title }}</td>
                              <td class="px-4 py-3 text-xs">
                                {{ Str::limit($a->description_original, 80) }}
                              </td>
                              <td class="px-4 py-3 text-sm">
                                @if ($a->status)
                                  <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100 text-[14px]">Approved</span>
                                @else
                                  <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100 text-[14px]">Not Approved</span>
                                @endif
                              <td class="px-4 py-3 flex items-center gap-2">
                                <a href="{{ route("admin.notification.fixmasalah.show", $a) }}" class="text-white bg-blue-800 p-2 rounded-lg">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5ZM12 17C9.24 17 7 14.76 7 12C7 9.24 9.24 7 12 7C14.76 7 17 9.24 17 12C17 14.76 14.76 17 12 17ZM12 9C10.34 9 9 10.34 9 12C9 13.66 10.34 15 12 15C13.66 15 15 13.66 15 12C15 10.34 13.66 9 12 9Z" fill="currentColor"/>
                                      </svg>                      
                                </a>
                                <a href="{{ route("admin.notification.fixmasalah.destroy", $a) }}" class="text-white bg-red-600 p-2 rounded-lg">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 19C6 20.1 6.9 21 8 21H16C17.1 21 18 20.1 18 19V7H6V19ZM8 9H16V19H8V9ZM15.5 4L14.5 3H9.5L8.5 4H5V6H19V4H15.5Z" fill="currentColor"/>
                                      </svg>                      
                                </a>
                              </td>
                            </tr>
                          @empty
                            
                          @endforelse
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800 hidden" id="carimasalah" role="tabpanel" aria-labelledby="carimasalah-tab">
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
            
                    <div class="w-full overflow-x-auto">
                      <table class="w-full">
                        <thead>
                          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Message</th>
                            <th class="px-4 py-3">Rating</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Actions</th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                          @forelse ($reviews as $r)
                            <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                              <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                  <div>
                                    <p class="font-semibold">{{ $r->user->name }}</p>
                                </div>
                              </td>
                              <td class="px-4 py-3 text-sm">
                                {{ $r->message }}
                              </td>
                              <td class="px-4 py-3 text-sm">
                                  
                                  <div class="flex items-center gap-2">

                                    @for ($i = 0; $i < $r->rating; $i++)
                                      <svg width="20" height="20" viewBox="0 0 24 24" fill="#FF9529" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z" fill="#FF9529"/>
                                    </svg>
                                    @endfor

                                  </div>
                              </td>
                              <td class="px-4 py-3">
                                @if ($r->status)
                                  <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100 text-[14px]">Approved</span>
                                @else
                                  <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100 text-[14px]">Not Approved</span>
                                @endif
                              </td>
                              <td class="px-4 py-3 flex items-center gap-2">
                                <a href="{{ route("admin.notification.reviews.show", $r) }}" class="text-white bg-blue-800 p-2 rounded-lg">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5ZM12 17C9.24 17 7 14.76 7 12C7 9.24 9.24 7 12 7C14.76 7 17 9.24 17 12C17 14.76 14.76 17 12 17ZM12 9C10.34 9 9 10.34 9 12C9 13.66 10.34 15 12 15C13.66 15 15 13.66 15 12C15 10.34 13.66 9 12 9Z" fill="currentColor"/>
                                      </svg>                      
                                </a>
                                <a href="{{ route("admin.notification.reviews.destroy", $r) }}" class="text-white bg-red-600 p-2 rounded-lg">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 19C6 20.1 6.9 21 8 21H16C17.1 21 18 20.1 18 19V7H6V19ZM8 9H16V19H8V9ZM15.5 4L14.5 3H9.5L8.5 4H5V6H19V4H15.5Z" fill="currentColor"/>
                                      </svg>                      
                                </a>
                              </td>
                            </tr>
                          @empty
                            
                          @endforelse
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 p-4 rounded-lg dark:bg-gray-800 hidden" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
            
                    <div class="w-full overflow-x-auto">
                      <table class="w-full">
                        <thead>
                          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Message</th>
                            <th class="px-4 py-3">Actions</th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                          @forelse ($contacts as $c)
                            <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                              <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                  <div>
                                    <p class="font-semibold">{{ $c->name }}</p>
                                </div>
                              </td>
                              <td class="px-4 py-3 text-sm">
                                {{ $c->email }}
                              </td>
                              <td class="px-4 py-3 text-sm">
                                {{ Str::limit($c->message, 100, "...") }}
                              </td>
                              <td class="px-4 py-3 flex items-center gap-2">
                                <a href="{{ route("admin.notification.contacts.show", $c) }}" class="text-white bg-blue-800 p-2 rounded-lg">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5ZM12 17C9.24 17 7 14.76 7 12C7 9.24 9.24 7 12 7C14.76 7 17 9.24 17 12C17 14.76 14.76 17 12 17ZM12 9C10.34 9 9 10.34 9 12C9 13.66 10.34 15 12 15C13.66 15 15 13.66 15 12C15 10.34 13.66 9 12 9Z" fill="currentColor"/>
                                      </svg>                      
                                </a>
                                <a href="{{ route("admin.notification.contacts.destroy", $c) }}" class="text-white bg-red-600 p-2 rounded-lg">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 19C6 20.1 6.9 21 8 21H16C17.1 21 18 20.1 18 19V7H6V19ZM8 9H16V19H8V9ZM15.5 4L14.5 3H9.5L8.5 4H5V6H19V4H15.5Z" fill="currentColor"/>
                                      </svg>                      
                                </a>
                              </td>
                            </tr>
                          @empty
                            {{-- <td class="px-4 py-3" align="center">
                              <h1 class="text-white text-lg text-center">No Data</h1>
                            </td> --}}
                          @endforelse
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>

@endsection