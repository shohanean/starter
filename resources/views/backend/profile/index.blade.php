@extends('layouts.dashboard')

@section('toolbar')
    @includeIf('parts.toolbar', [
        'links' => [
            'home' => 'home',
            'profile overview' => 'profile.index'
        ]
    ])
@endsection

@section('content')
    @livewire('profile.index')
@endsection
