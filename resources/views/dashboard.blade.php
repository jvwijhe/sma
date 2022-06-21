<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="mb-3 text-xl font-semibold">Hi {{$user->name}}</h1>
                    
                    <p>Welcome to this SMA. To get started, you can create secure messages on <a href="{{route('messages.create')}}" class="text-indigo-500 underline">this</a> page</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
