@extends('layouts.app')

@section('platform')
    
<div class="overflow-hidden px-4 sm:px-6 lg:px-8 ">
    <div class="relative mx-auto max-w-xl">
      <div class="text-center">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ __('New Could You') }}</h2>
        <p class="mt-4 text-lg leading-6 text-gray-500">{{ __('Here you can add a new could you and save yourself an argument') }}</p>
      </div>
      <div class="mt-12">
        <form action="/event" method="POST" class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
          @csrf
          <div class="sm:col-span-2">
            <label for="company" class="block text-sm font-medium text-gray-700">{{ __('Title') }}</label>
            <div class="mt-1">
              <input type="text" name="title" id="title" class="block w-full rounded-md border-gray-300 py-3 px-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
          </div>
          <div class="sm:col-span-2">
            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Date') }}</label>
            <div class="mt-1">
              <input id="date" name="date" type="date" autocomplete="email" class="block w-full rounded-md border-gray-300 py-3 px-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            </div>
          </div>

        <div class="sm:col-span-2">
            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Invite friend') }}</label>

            <div class=" flex justify-center">

                <div class="w-full">
                  {{-- <label for="search" class="sr-only">Search</label>
                  <div class="relative text-gray-400 focus-within:text-gray-500">
                    <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                      <!-- Heroicon name: solid/search -->
                      <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                      </svg>
                    </div>
                    <input id="search" class="block w-full bg-white py-2 pl-10 pr-3 border border-gray-300 rounded-md leading-5 text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-purple-500 focus:border-purple-500 focus:placeholder-gray-500 sm:text-sm" placeholder="Search" type="search" name="invited_id">
                  </div> --}}
                  <livewire:search-bar />
                </div>
              </div>

        </div>
        
        <div class="sm:col-span-2">
            <label for="location" class="block text-sm font-medium text-gray-700">{{ __('Could You') }}</label>
            <select id="type" name="type" class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                <option value="1">bring something to our date?</option>
            </select>
        </div>
  

          {{-- <div class="sm:col-span-2">
            <div class="flex items-start">
              <div class="flex-shrink-0">
                <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
                <button type="button" class="bg-gray-200 relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" role="switch" aria-checked="false">
                  <span class="sr-only">Agree to policies</span>
                  <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                  <span aria-hidden="true" class="translate-x-0 inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
                </button>
              </div>
              <div class="ml-3">
                <p class="text-base text-gray-500">
                  By selecting this, you agree to the
                  <a href="#" class="font-medium text-gray-700 underline">Privacy Policy</a>
                  and
                  <a href="#" class="font-medium text-gray-700 underline">Cookie Policy</a>.
                </p>
              </div>
            </div>
          </div> --}}

          {{-- <input type="text" name="attributes[]"> --}}
              <livewire:add-attribute />
        {{-- </input> --}}
          <div class="sm:col-span-2">
            <button type="submit" class="inline-flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">{{ __('Submit') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
@endsection