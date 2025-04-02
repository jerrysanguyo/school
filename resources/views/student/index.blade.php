@extends('layouts.dashboard')
@section('content')

<nav class="mb-4">
    <ol class="flex items-center space-x-2 text-sm">
        <li>
            <a href="{{ route(Auth::user()->role . '.user.index') }}"
                class="font-medium text-blue-500 hover:text-blue-600">Users</a>
        </li>
        <li>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
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
            @include('student.create')
        </div>
    </div>

    @include('alert.index')
    
    <!-- Search input (auto submits on keyup) -->
    <div class="mb-4">
        <input type="text" id="search" name="search" placeholder="Search by first name..."
               value="{{ request('search') }}" class="border rounded p-2 w-full">
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($users as $user)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="px-8 py-6 bg-gray-800 text-white">
                <h2 class="text-xl font-bold">
                    {{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}
                </h2>
                <p class="text-sm capitalize">{{ $user->role }}</p>
            </div>
            <div class="px-8 py-6 text-gray-800">
                <p class="mb-2"><span class="font-semibold">Email:</span> {{ $user->email }}</p>
                <p class="mb-2"><span class="font-semibold">Contact:</span> {{ $user->contact_number }}</p>
            </div>
            <div class="flex justify-center space-x-2 border-t border-gray-200 px-3 py-4">
                <button class="p-2 bg-blue-100 text-blue-500 hover:bg-blue-200 hover:text-blue-700 rounded transition-colors" title="Edit">
                    <i class="fa-solid fa-pen-to-square"></i> Edit
                </button>
                <button class="p-2 bg-green-100 text-green-500 hover:bg-green-200 hover:text-green-700 rounded transition-colors" title="View user">
                    <i class="fa-solid fa-expand"></i> View user
                </button>
                <button class="p-2 bg-red-100 text-red-500 hover:bg-red-200 hover:text-red-700 rounded transition-colors" title="Delete">
                    <i class="fa-solid fa-trash"></i> Delete
                </button>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $users->links() }}
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById('search');
        let timeout = null;
        searchInput.addEventListener('keyup', function () {
            clearTimeout(timeout);
            timeout = setTimeout(function () {
                const query = searchInput.value;
                const url = new URL(window.location.href);
                url.searchParams.set('search', query);
                window.location.href = url.toString();
            }, 500);
        });
    });
</script>

@endsection
