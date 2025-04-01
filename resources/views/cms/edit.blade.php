<div x-show="showEditModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center">
    <div class="fixed inset-0 bg-black opacity-50" @click="showEditModal = false"></div>
    <div x-show="showEditModal" x-cloak x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class="bg-white rounded-lg shadow-lg z-10 p-6 w-full max-w-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Edit {{ $resource }}</h2>
            <button @click="showEditModal = false"
                class="text-gray-600 hover:text-gray-800 text-2xl leading-none">&times;</button>
        </div>
        <form action="{{ route(Auth::user()->role . '.' . $resource . '.update', $$resource->id) }}" method="POST">
            @csrf
            @method('put')
            <div class="mt-5 mb-4">
                <label for="name-{{ $$resource->id }}" class="block text-gray-700 text-left text-lg">{{ $page_title }}:</label>
                <input type="text" id="name-{{ $$resource->id }}" name="name" placeholder="Enter name"
                    value="{{ $$resource->name }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <div class="mb-4">
                <label for="remarks-{{ $$resource->id }}" class="block text-gray-700 text-left text-lg">Remarks:</label>
                <input type="text" id="remarks-{{ $$resource->id }}" name="remarks" placeholder="Enter remarks"
                    value="{{ $$resource->remarks }}"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            <div class="flex justify-end">
                <button type="button" @click="showEditModal = false"
                    class="px-4 py-2 mr-2 text-black rounded-lg hover:bg-gray-300 transition-colors">Cancel</button>
                <button type="submit"
                    class="px-4 py-2 text-white bg-gray-700 rounded-lg hover:bg-gray-300 hover:text-black transition-colors">Submit</button>
            </div>
        </form>
    </div>
</div>