
<div class="online-members" >
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


