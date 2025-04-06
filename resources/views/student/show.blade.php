@extends('layouts.dashboard')
@section('content')

@section('breadcrumb')
<x-breadcrumb :items="[
        ['label' => 'Students', 'url' => route(Auth::user()->role . '.user.index')],
        ['label' => 'User Details'],
    ]" />
@endsection

<div class="flex justify-between mb-5">
    <h1 class="text-3xl font-bold text-center text-gray-800 mt-1">
        User Details
    </h1>
</div>

<div class="bg-[#1A4798] p-3 rounded-lg">
    <p class="text-xl text-white font-semibold text-center mt-5 text-start p-5">
        {{ $user->first_name }}
        {{ $user->middle_name }}
        {{ $user->last_name }}
    </p>
</div>

@include('alert.index')

@endsection