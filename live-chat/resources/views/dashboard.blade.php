<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>All members</h3>

                    @foreach($users as $user)
                        <div class="card" style="width: 18rem; display: inline-block">
                            <div class="member-img"> <img
                                    src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="card-body">
                                <h5 class="card-title">{{$user->name}}</h5>
                                <div class="online-spot-dashboard" style="background: {{$user->last_seen >=now()->subMinutes(1)?'#049304':'#df0000'}};"></div>

                                <a href="{{route('chat',$user->id)}}" class="btn btn-primary">Message</a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
