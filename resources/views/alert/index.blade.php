@if (session('success'))
<div class="bg-green-100 border border-green-400 text-white-700 px-4 py-3 rounded relative mb-4 text-center"
    role="alert">
    <span class="block sm:inline">{{ session('success') }}</span>
</div>
@endif
@if (session('failed'))
<div class="bg-red-100 border border-red-400 text-white-700 px-4 py-3 rounded relative mb-4 text-center" role="alert">
    <span class="block sm:inline">{{ session('failed') }}</span>
</div>
@endif