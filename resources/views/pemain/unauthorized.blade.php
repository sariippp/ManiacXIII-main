@extends('pemain.layout.redirect', ['title' => 'Unauthorized Participant'])

@section('styles')
    <style>
        .action:hover {
            color: white !important;
        }
    </style>
@endsection

@section('content')
    <div class="w-full h-screen border border-warning flex flex-col justify-center items-center gap-7">
        <h1 class="text-3xl text-primary">You are not registered for this contest.</h1>
        <img src="{{ asset('asset2024') }}/errors.svg" alt="" width="20%">
        <a href="{{ route('team.index') }}" class="btn btn-accent action rounded-md">Back to Dashboard</a>
    </div>
@endsection
