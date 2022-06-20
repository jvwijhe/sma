<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full justify-end flex mb-3">
                <a href="{{route('messages.create')}}" class="font-bold bg-indigo-500 text-white p-3 rounded">Add a message</a>
            </div>
            <div class="bg-white shadow-sm sm:rounded-lg grid grid-cols-1 px-6">
                @foreach ($messages as $message)
                <div class="flex gap-6 justify-between p-3">
                    <div class="flex-1 ">
                        <a href="{{route('messages.edit',$message)}}" class="text-gray-900 font-normal block">{{$message->name}}</a>
                        <span class="text-gray-500">{{$message->slug}}</span>
                    </div>

                    <div class="w-60 text-gray-500 flex items-center gap-3">
                        <a href="{{route('messages.edit',$message)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                        </a>
                        <a href="{{$message->signed_url}}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                              </svg>
                        </a>
                    </div>
                 </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
