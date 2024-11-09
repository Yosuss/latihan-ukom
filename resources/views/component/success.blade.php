@if(session('success'))
    <div class="w-full text-2xl capitalize font-semibold bg-green-500 text-white p-4">
        {{ session('success') }}
    </div>
@endif
