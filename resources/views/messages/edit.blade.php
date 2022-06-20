<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit')}}  {{ $message->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <form method="POST" action="{{route('messages.update', $message) }}" class="max-w-3xl p-6 bg-white border-b border-gray-200 grid grid-cols-4 gap-6">
                    @csrf
                    @method('PUT')

                  <div class="col-span-2">
                    <label class="block text-sm text-gray-700 mb-2">Name</label>
                    <input type="text" name="name" value="{{ old('name', $message->name) }}" class="py-1 px-3 bg-gray-50 rounded border-0 w-full"/>

                    @error('name')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror

                  </div>

                  <div class="col-span-2">
                    <label class="block text-sm text-gray-700 mb-2">Password</label>
                    <input type="text" name="password" value="{{ old('password', $message->password) }}" class="py-1 px-3 bg-gray-50 rounded border-0 w-full"/>
                    @error('password')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="col-span-4">
                    <label class="block text-sm text-gray-700 mb-2">Message</label>
                    <textarea name="message" class="py-1 px-3 bg-gray-50 rounded border-0 w-full">{{ old('message', $message->message) }}</textarea>
                    @error('message')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                  </div>

                 

                  <div class="col-span-4">
                    <button type="submit" class="font-bold bg-indigo-500 text-white p-3 rounded">Submit</button>
                  </div>


                </form>
            </div>
        </div>
    </div>
</x-app-layout>
