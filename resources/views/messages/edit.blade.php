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
                    <label class="block text-sm text-gray-700 mb-2">Contact uitnodignen</label>
                    <div>
                        @foreach ($contacts as $contact)
                            <div>
                                <label>
                                    <input type="checkbox" name="contacts[]" value="{{$contact['email']}}" 
                                    @if($message->contacts && in_array($contact['email'], $message->contacts)) checked @endif
                                     class="p-2 bg-gray-100 rounded border-0"/>
                                    <span class="text-gray-700">{{$contact['name']}}</span>
                                </label>
                                </div>
                        @endforeach
                    </div>
                     
                    @error('contacts')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                  </div>


                
                  <div class="col-span-4 flex items-center gap-6">
                    <button type="submit" class="font-bold bg-indigo-500 text-white p-3 rounded">Submit</button>
                    <a href="{{route('messages.index')}}" class="font-bold bg-transparent text-gray-500 p-3 rounded">Annuleren</a>
                  </div>
                </form>
            </div>
        </div>
    </div>



    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">


                  <div class="flex items-center gap-6">
                    <button type="button" @click="resendInvites" class="font-bold bg-indigo-500 text-white p-3 rounded">Re-send invites</button>
                    <button type="button" class="font-bold bg-transparent flex gap-3 text-red-500 p-3 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                          </svg>
                          <span class="inline-block">Delete message</span>
                    </button>

                  </div>

            </div>
        </div>
    </div>
    
</x-app-layout>
