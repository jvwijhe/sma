<x-guest-layout>
   

    <div class="py-12 m-auto lg:py-24">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">        
                    <unlock-message-form :id="{{$message->id}}" />
            </div>
        </div>

       

        <div class="fixed bottom-0 left-0 flex items-center justify-center w-full mb-12">
           
            <ul class="flex items-center gap-3"> 
                @auth
                <li><a href="{{route('dashboard')}}" class="text-sm text-gray-700 underline">Dashboard</a></li>
                @endauth
                @guest
                <li><a href="{{route('login')}}" class="text-sm text-gray-700 underline">Login</a></li>
                <li><a href="{{route('register')}}" class="text-sm text-gray-700 underline">Register</a></li>
                @endguest
            </ul>
        </div>
       
    </div>
</x-guest-layout>
