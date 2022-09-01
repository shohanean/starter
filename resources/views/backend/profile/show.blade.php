@extends('layouts.dashboard')

@section('toolbar')
    @includeIf('parts.toolbar', [
        'links' => [
            'home' => 'home',
            'change password' => ''
        ]
    ])
@endsection

@section('content')
    @livewire('profile.changepassword')
@endsection
