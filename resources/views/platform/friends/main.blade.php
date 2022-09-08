@extends('layouts.app')

@section('platform')

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="">
    <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
      <div class="space-y-8 sm:space-y-12">
        <div class="sm:mx-auto sm:max-w-xl sm:space-y-4 lg:max-w-5xl">
          <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">Your friends</h2>
          {{-- <p class="text-xl text-gray-500"></p> --}}
        </div>
        <ul role="list" class="mx-auto grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-4 md:gap-x-6 lg:max-w-5xl lg:gap-x-8 lg:gap-y-12 xl:grid-cols-6">
          <li>
            <div class="space-y-4">
              <img class="mx-auto h-20 w-20 rounded-full lg:h-24 lg:w-24" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">
              <div class="space-y-2">
                <div class="text-xs font-medium lg:text-sm">
                  <h3>Michael Foster</h3>
                  <p class="text-indigo-600">Co-Founder / CTO</p>
                </div>
              </div>
            </div>
          </li>
  
          <!-- More people... -->
        </ul>
      </div>
    </div>
  </div>
  
    
@endsection