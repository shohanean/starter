@extends('layouts.dashboard')

@section('user_management')
here show
@endsection

@section('user.index')
active
@endsection

@section('toolbar')
    @include('parts.toolbar')
@endsection

@section('content')
    @livewire('adduser')
@endsection

