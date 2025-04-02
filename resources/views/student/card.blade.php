<div class="flex justify-between mb-5">
    <div class="max-w-md w-full bg-white rounded-lg shadow-lg mb-6 mx-auto min-w-90">
        <div class="px-8 py-6 bg-gray-800 text-white rounded-t-lg">
            <h2 class="text-xl font-bold">
                {{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}
            </h2>
            <p class="text-sm capitalize">{{ $user->role }}</p>
        </div>
        <div class="px-8 py-6 text-gray-800">
            <p class="mb-2"><span class="font-semibold">Email:</span> {{ $user->email }}</p>
            <p class="mb-2"><span class="font-semibold">Contact:</span> {{ $user->contact_number }}</p>
        </div>
        <div class="flex justify-center flex-nowrap space-x-2 border-t border-gray-200 px-3 py-4">
            <button
                class="p-2 bg-blue-100 text-blue-500 hover:bg-blue-200 hover:text-blue-700 rounded transition-colors"
                title="Edit">
                <i class="fa-solid fa-pen-to-square"></i> Edit
            </button>
            <button
                class="p-2 bg-green-100 text-green-500 hover:bg-green-200 hover:text-green-700 rounded transition-colors"
                title="View user">
                <i class="fa-solid fa-expand"></i> View user
            </button>
            <button class="p-2 bg-red-100 text-red-500 hover:bg-red-200 hover:text-red-700 rounded transition-colors"
                title="Delete">
                <i class="fa-solid fa-trash"></i> Delete
            </button>
        </div>
    </div>
</div>