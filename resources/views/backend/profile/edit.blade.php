@extends('layouts.dashboard')

@section('toolbar')
    @includeIf('parts.toolbar', [
        'links' => [
            'home' => 'home',
            'profile edit' => ''
        ]
    ])
@endsection

@section('content')
    @livewire('profile.edit')
@endsection
