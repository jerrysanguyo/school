@extends('layouts.dashboard')
@section('content')

@section('breadcrumb')
    <x-breadcrumb :items="[
        ['label' => 'Students', 'url' => route(Auth::user()->role . '.user.index')],
    ]" />
@endsection

<div class="flex justify-between mb-5">
    <h1 class="text-3xl font-bold text-center text-gray-800">User Records</h1>
    <div x-data="{ showModal: false }">
        <button @click="showModal = true"
            class="px-5 py-2 text-white bg-[#1A4798] rounded-lg hover:bg-[#F4C027] hover:text-black hover:border border-[#F4C027] transition-colors">
            <i class="fa-solid fa-plus"></i> Add User
        </button>
        @include('student.create')
    </div>
</div>

@include('alert.index')

<div class="mb-3">
    <input type="text" id="search" name="search" placeholder="Search by name..." value="{{ request('search') }}"
        class="border border-gray-300 rounded p-2 w-full">
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach ($users as $user)
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="px-8 py-6 bg-[#1A4798] text-white">
            <h2 class="text-xl font-bold">
                {{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}
            </h2>
            <p class="text-sm capitalize">{{ $user->type }}</p>
        </div>
        <div class="px-8 py-6 text-gray-800">
            <p class="mb-2"><span class="font-semibold">Email:</span> {{ $user->email }}</p>
            <p class="mb-2"><span class="font-semibold">Contact:</span> {{ $user->contact_number }}</p>
        </div>
        <div class="flex justify-center space-x-2 border-t border-gray-200 px-3 py-4">
            <div x-data="{ showEditModal: false }">
                <button @click="showEditModal = true"
                    class="p-2 bg-blue-100 text-blue-500 hover:bg-blue-200 hover:text-blue-700 rounded transition-colors"
                    title="Edit">
                    <i class="fa-solid fa-pen-to-square"></i> Edit
                </button>
                @include('student.edit')
            </div>
            <a href="{{ route(Auth::user()->role . '.user.show', $user->id) }}">
                <button
                    class="p-2 bg-green-100 text-green-500 hover:bg-green-200 hover:text-green-700 rounded transition-colors"
                    title="View user">
                    <i class="fa-solid fa-expand"></i> View user
                </button>
            </a>
            <div x-data="{ showDeleteModal: false }">
                <button @click="showDeleteModal = true"
                    class="p-2 bg-red-100 text-red-500 hover:bg-red-200 hover:text-red-700 rounded transition-colors"
                    title="Delete">
                    <i class="fa-solid fa-trash"></i> Delete
                </button>
                @include('student.delete')
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-6">
    {{ $users->links() }}
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById('search');
    let timeout = null;
    searchInput.addEventListener('keyup', function() {
        clearTimeout(timeout);
        timeout = setTimeout(function() {
            const query = searchInput.value;
            const url = new URL(window.location.href);
            url.searchParams.set('search', query);
            window.location.href = url.toString();
        }, 500);
    });
});
</script>

@endsection