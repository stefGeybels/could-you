@extends('layouts.app')

@section('platform')

<livewire:dashboard-calendar 
    :day-click-enabled="true"
/>

@endsection