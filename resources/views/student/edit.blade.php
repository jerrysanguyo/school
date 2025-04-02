<div x-show="showEditModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center">
    <div class="fixed inset-0 bg-black opacity-50" @click="showEditModal = false"></div>
    <div x-show="showEditModal" x-cloak x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        class="bg-white rounded-lg shadow-lg z-10 p-6 w-full max-w-2xl">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">Update the record of {{ $user->first_name }} {{ $user->middle_name }}
                {{ $user->last_name }}</h2>
            <button @click="showEditModal = false"
                class="text-gray-600 hover:text-gray-800 text-2xl leading-none">&times;</button>
        </div>
        <form action="{{ route(Auth::user()->role . '.' . $resource . '.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="first_name" class="block text-gray-700">First name:</label>
                    <input type="text" id="first_name" name="first_name" placeholder="Enter first name"
                        value="{{ $user->first_name }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div>
                    <label for="middle_name" class="block text-gray-700">Middle name:</label>
                    <input type="text" id="middle_name" name="middle_name" placeholder="Enter Middle name"
                        value="{{ $user->middle_name }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
                <div>
                    <label for="last_name" class="block text-gray-700">Last name:</label>
                    <input type="text" id="last_name" name="last_name" placeholder="Enter Last name"
                        value="{{ $user->last_name }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="email" class="block text-gray-700">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Enter email" value="{{ $user->email }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="contact_number" class="block text-gray-700">Contact number:</label>
                    <input type="text" name="contact_number" id="contact_number" placeholder="Enter contact number"
                        value="{{ $user->contact_number }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="type" class="block text-gray-700">Type:</label>
                    <div class="relative">
                        <select id="type" name="type"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none">
                            <option value="student" {{ $user->type === 'student' ? 'selected' : '' }}>Student</option>
                            <option value="faculty" {{ $user->type === 'faculty' ? 'selected' : '' }}>Faculty</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20">
                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586 
                         l3.293-3.293a1 1 0 011.414 1.414 
                         l-4 4a1 1 0 01-1.414 0 
                         l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="role" class="block text-gray-700">Role:</label>
                    <div class="relative">
                        <select name="role" id="role"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none">
                            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="superadmin" {{ $user->role === 'superadmin' ? 'selected' : '' }}>Superadmin
                            </option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20">
                                <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586 
                         l3.293-3.293a1 1 0 011.414 1.414 
                         l-4 4a1 1 0 01-1.414 0 
                         l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </div>
                    </div>
                </div>
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