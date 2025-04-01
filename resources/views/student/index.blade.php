@extends('layouts.dashboard')
@section('content')

<nav class="mb-4">
    <ol class="flex items-center space-x-2 text-sm">
        <li>
            <a href="{{ route(Auth::user()->role . '.user.index') }}"
                class="font-medium text-blue-500 hover:text-blue-600">Users</a>
        </li>
        <li>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" 
                      d="M9 5l7 7-7 7"></path>
            </svg>
        </li>
        <li class="font-medium text-gray-700">Cards</li>
    </ol>
</nav>

<div class="bg-white shadow-lg rounded-lg p-6">
    <div class="flex justify-between mb-5">
        <h1 class="text-3xl font-bold text-center text-gray-800">User Records</h1>
        <div x-data="{ showModal: false }">
            <button @click="showModal = true"
                class="mt-1 px-5 py-2 text-white bg-gray-700 rounded-lg hover:bg-gray-100 hover:text-black hover:border border-gray-300 transition-colors">
                <i class="fa-solid fa-plus"></i> Add User
            </button>
            @include('cms.create')
        </div>
    </div>

    @include('alert.index')
    
    {{ $dataTable->table(['class' => 'w-full']) }}
</div>

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush

@endsection
