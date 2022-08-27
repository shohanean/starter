@extends('layouts.dashboard')

@section('user_management')
here show
@endsection

@section('user.index')
active
@endsection

@section('toolbar')
    @includeIf('parts.toolbar', [
        'links' => [
            'home' => 'home',
            'users' => 'user.index'
        ]
    ])
@endsection

@section('content')
    @livewire('adduser')
@endsection

