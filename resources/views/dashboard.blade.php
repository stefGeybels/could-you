@extends('layouts.app')

@section('platform')
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="mx-auto max-w-6xl">
        <livewire:dashboard-calendar 
            :day-click-enabled="true"
            before-calendar-view="platform/calendar/navigation/selectMonth"
        />
    </div>
  
@endsection
