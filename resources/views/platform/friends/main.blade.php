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
  
          @foreach ($requests as $friend)
          <li>
            <div class="space-y-4">
              <img class="mx-auto h-20 w-20 rounded-full lg:h-24 lg:w-24" src="{{ ($friend->profile_photo_path === null) ? $friend->profile_photo_url : $friend->profile_photo_path }}" alt="">
              <div class="space-y-2">
                <div class="text-xs font-medium lg:text-sm">
                  <h3>{{ $friend->name }} Stef</h3>
                  <form action="/accept-friendship/{{$friend->id}}" method="post" id="accept">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="request_id" value="{{$friend->id}}">
                  </form>
                  <form action="/friend/remove/{{$friend->id}}" method="post" id="reject">
                    @csrf
                    @method('DELETE')
                  </form>
                  <button type="submit" form="accept" class="inline-flex mb-2 items-center rounded-md border border-transparent bg-green-300 px-3 py-2 text-sm font-medium leading-4 text-green-700 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Accept</button>
                  <button type="submit" form="reject" class="inline-flex items-center rounded-md border border-transparent bg-red-300 px-3 py-2 text-sm font-medium leading-4 text-red-700 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Reject</button>
                </div>
              </div>
            </div>
          </li> 
          @endforeach

          @foreach ($friends as $friend)
          <li>
            <div class="space-y-4">
              <img class="mx-auto h-20 w-20 rounded-full lg:h-24 lg:w-24" src="{{ $friend->profile_photo_url }}" alt="">
              <div class="space-y-2">
                <div class="text-xs font-medium lg:text-sm">
                  <h3>{{ $friend->name }}</h3>
                  <form action="/friend/delete/{{$friend->id}}" method="post" id="remove{{$friend->id}}">
                    @csrf
                    @method('DELETE')
                  </form>
                  <a href="/event/create" class="inline-flex mb-2 items-center rounded-md border border-transparent bg-indigo-300 px-3 py-2 text-sm font-medium leading-4 text-indigo-700 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Could you?</a>
                  <button type="submit" form="remove{{ $friend->id }}" class="inline-flex items-center rounded-md border border-transparent bg-red-300 px-3 py-2 text-sm font-medium leading-4 text-red-700 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Remove</button>
                </div>
              </div>
            </div>
          </li> 
          @endforeach
          
  
          <!-- More people... -->
        </ul>
      </div>
    </div>
  </div>
  
    
@endsection