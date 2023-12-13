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
                    <div class="online-members">
                        @forelse($users as $user)
                            @if($user->id==Auth::user()->id)
                                <div class="incoming_msg_img-users">
                                    <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                    <div class="online-spot" style="background: {{$user->last_seen >=now()->subMinutes(1)?'#049304':'#df0000'}};"></div>
                                    <p>You</p>

                                </div>
                            @else
                            <div class="incoming_msg_img-users">
                                <a href="{{route('chat',$user->id)}}">
                                    <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                    <div class="online-spot" style="background: {{$user->last_seen >=now()->subMinutes(1)?'#049304':'#df0000'}};"></div>
                                    <p>{{$user->name}}</p>
                                </a>
                            </div>
                            @endif
                        @empty
                            <p>No Active Users</p>
                        @endforelse

                    </div>
{{--                    <livewire:chat></livewire:chat>--}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
