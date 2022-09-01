@extends('layouts.dashboard')

@section('profile.index')
active
@endsection

@section('toolbar')
    @includeIf('parts.toolbar', [
        'links' => [
            'home' => 'home',
            'profile overview' => 'profile.index',
            'change password' => ''
        ]
    ])
@endsection

@section('content')
    @livewire('profile.changepassword')
@endsection
