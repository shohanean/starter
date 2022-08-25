@extends('layouts.dashboard')

@section('toolbar')
    @include('parts.toolbar')
@endsection

@section('content')
    @livewire('adduser')
@endsection

