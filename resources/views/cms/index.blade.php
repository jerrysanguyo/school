@extends('layouts.dashboard')
@section('content')

<nav class="mb-4">
    <ol class="flex items-center space-x-2 text-sm">
        <li>
            <a href="{{ route(Auth::user()->role . '.' . $resource . '.index') }}"
                class="font-medium text-blue-500 hover:text-blue-600">{{ $page_title }}</a>
        </li>
        <li>
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
            </svg>
        </li>
        <li class="font-medium text-gray-700">Table</li>
    </ol>
</nav>

<div class="bg-white shadow-lg rounded-lg p-6">
    <div class="flex justify-between mb-5">
        <h1 class="text-3xl font-bold mb-2 text-center text-gray-800">{{ $page_title }} records</h1>
        <div x-data="{ showModal: false }">
            <button @click="showModal = true"
                class="mt-1 px-5 py-2 text-white bg-gray-700 rounded-lg hover:bg-gray-100 hover:text-black hover:border border-gray-300 transition-colors">
                <i class="fa-solid fa-plus"></i> Add {{ $resource }}
            </button>
            @include('cms.create')
        </div>
    </div>
    @include('alert.index')
    <div class="">
        <table class="min-w-full border border-gray-200" id="{{ $resource }}-table">
            <thead class="bg-gray-200">
                <tr class="text-gray-700 uppercase text-sm leading-normal">
                    @foreach ($columns as $column)
                    <th class="py-3 px-4 cursor-pointer">
                        {{ $column }}
                    </th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light text-center">
                @foreach ($districts as $district)
                <tr class="border border-gray-200 hover:bg-gray-100 transition-colors">
                    <td class="px-4 py-2">{{ $district->id }}</td>
                    <td class="py-3 px-4">{{ $district->name }}</td>
                    <td class="py-3 px-4">{{ $district->remarks }}</td>
                    <td class="py-3 px-4">{{ $district->createdBy->first_name . ' - ' . $district->created_at }}</td>
                    <td class="py-3 px-4">{{ $district->updatedBy->first_name . ' - ' . $district->updated_at }}</td>
                    <td class="py-3 px-4">
                        <div class="inline-flex items-center space-x-2">
                            <div x-data="{ showEditModal: false }">
                                <button @click="showEditModal = true"
                                    class="inline-block p-2 bg-blue-100 text-blue-500 hover:bg-blue-200 hover:text-blue-700 rounded transition-colors"
                                    title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                @include('cms.edit')
                            </div>
                            <div x-data="{ showDeleteModal: false }">
                                <button @click="showDeleteModal = true"
                                    class="inline-block p-2 bg-red-100 text-red-500 hover:bg-red-200 hover:text-red-700 rounded transition-colors"
                                    title="Delete">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                @include('cms.delete')
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#{{ $resource }}-table').DataTable({
        processing: true,
        serverSide: false,
        pageLength: 10,
        order: [
            [0, 'desc']
        ],

        dom: '<"flex justify-between items-center mb-4"lf>rt<"flex justify-between items-center mt-4"ip>',

        initComplete: function() {
            const table = this.api();

            const $searchInput = $('div.dataTables_filter input');
            $searchInput.addClass(
                'ml-2 px-4 py-1 border border-gray-300 rounded focus:outline-none ' +
                'focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
            );

            const $lengthSelect = $('div.dataTables_length select');
            $lengthSelect.addClass(
                'px-4 py-1 my-2 border border-gray-300 rounded focus:outline-none ' +
                'focus:ring focus:ring-indigo-200 focus:ring-opacity-50'
            );
        },

        drawCallback: function(settings) {

            const $paginateButtons = $('div.dataTables_paginate .paginate_button');
            $paginateButtons.addClass(
                'px-4 py-2 text-black rounded-lg hover:bg-gray-300 disabled:opacity-50 ' +
                'disabled:cursor-not-allowed transition-colors'
            );

            const $currentPage = $('div.dataTables_paginate .paginate_button.current');
            $currentPage.addClass(
                'px-4 py-2 rounded-lg transition-colors hover:bg-gray-200 hover:text-black bg-gray-700 text-white'
            );
        }
    });
});
</script>

@endsection