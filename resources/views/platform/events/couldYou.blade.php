@extends('layouts.app')

@section('platform')

@if (Session::has('errors'))

<!-- This example requires Tailwind CSS v2.0+ -->
  <div class="rounded-md bg-red-50 p-4">
    <div class="flex">
      <div class="flex-shrink-0">
      <!-- Heroicon name: solid/x-circle -->
        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
        </svg>
      </div>
    <div class="ml-3">
  <h3 class="text-sm font-medium text-red-800">{{ __('Sorry something went wrong') }}</h3>
  <div class="mt-2 text-sm text-red-700">
    <ul role="list" class="list-disc pl-5 space-y-1">
@foreach ($errors->all() as $error)          
<li>{{ $error }}</li>  
@endforeach 
    </ul>
  </div>
</div>
</div>
</div>

          
@endif
    
<div class="overflow-hidden px-4 sm:px-6 lg:px-8 ">
    <div class="relative mx-auto max-w-xl">

      @if (isset($event))
      <h1>
        <span class="block text-center text-lg font-semibold text-indigo-600">{{ __('Could You') }}</span>
        <span class="mt-2 block text-center text-3xl font-bold leading-8 tracking-tight text-gray-900 sm:text-4xl">{{ $event->title }}</span>
      </h1>

      <livewire:could-you 
        :event="$event"
      /> 
  
      @endif


    </div>
  </div>
  
@endsection