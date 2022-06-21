<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Add a message') }}
        </h2>
    </x-slot>


    

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                
             
                <form method="POST"  action="{{route('messages.store')}}" class="grid max-w-3xl grid-cols-4 gap-6 p-6 bg-white border-b border-gray-200">
                    @csrf
                  <div class="col-span-2">
                    <label class="block mb-2 text-sm text-gray-700">Name</label>
                    <input type="text" name="name" class="w-full px-3 py-1 border-0 rounded bg-gray-50"/>

                    @error('name')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror

                  </div>
                  <div class="col-span-2">
                    <label class="block mb-2 text-sm text-gray-700">Password</label>
                    <input type="text" name="password" class="w-full px-3 py-1 border-0 rounded bg-gray-50"/>
                    @error('password')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                  </div>


                  <div class="col-span-4">
                    <label class="block mb-2 text-sm text-gray-700">Message</label>
                    <textarea name="message" class="w-full px-3 py-1 border-0 rounded bg-gray-50"></textarea>
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
                                    <input type="checkbox" name="contacts[]" value="{{$contact['email']}}" class="p-2 bg-gray-100 border-0 rounded"/>
                                    <span class="text-gray-700">{{$contact['name']}}</span>
                                </label>
                                </div>
                        @endforeach
                    </div>
                     
                    @error('contacts')
                        <div class="text-sm text-red-500">{{ $message }}</div>
                    @enderror
                  </div>



                

                  <div class="col-span-4">

                    <button type="submit" class="p-3 font-bold text-white bg-indigo-500 rounded">Create message</button>
                  </div>               
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
