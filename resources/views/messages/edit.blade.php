<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit')}}  {{ $message->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <form method="POST" action="{{route('messages.update', $message) }}" class="grid max-w-3xl grid-cols-4 gap-6 p-6 bg-white border-b border-gray-200">
                    @csrf
                    @method('PUT')

                  <div class="col-span-2">
                    <label class="block mb-2 text-sm text-gray-700">Name</label>
                    <input type="text" name="name" value="{{ old('name', $message->name) }}" class="w-full px-3 py-1 border-0 rounded bg-gray-50"/>

                    @error('name')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror

                  </div>

            

                  <div class="col-span-4">
                    <label class="block mb-2 text-sm text-gray-700">Message</label>
                    <textarea name="message" class="w-full px-3 py-1 border-0 rounded bg-gray-50">{{ old('message', $message->decrypted_message) }}</textarea>
                    @error('message')
                    <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                  </div>


                  <div class="col-span-4">
                    <label class="block mb-2 text-sm text-gray-700">Contact uitnodignen</label>
                    <div>
                        @foreach ($contacts as $contact)
                            <div>
                                <label>
                                    <input type="checkbox" name="contacts[]" value="{{$contact['email']}}" 
                                    @if($message->contacts && in_array($contact['email'], $message->contacts)) checked @endif
                                     class="p-2 bg-gray-100 border-0 rounded"/>
                                    <span class="text-gray-700">{{$contact['name']}}</span>
                                </label>
                                </div>
                        @endforeach
                    </div>
                     
                    @error('contacts')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                  </div>


                
                  <div class="flex items-center col-span-4 gap-6">
                    <button type="submit" class="p-3 font-bold text-white bg-indigo-500 rounded">Submit</button>
                    <a href="{{route('messages.index')}}" class="p-3 font-bold text-gray-500 bg-transparent rounded">Annuleren</a>
                  </div>
                </form>
            </div>
        </div>
    </div>



    <div class="pb-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">


                  <div class="flex items-center gap-6">
                    <button type="button" @click="resendInvites" class="p-3 font-bold text-white bg-indigo-500 rounded">Re-send invites</button>
                    <button type="button" class="flex gap-3 p-3 font-bold text-red-500 bg-transparent rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                          </svg>
                          <span class="inline-block">Delete message</span>
                    </button>

                  </div>

            </div>
        </div>
    </div>
    
</x-app-layout>
