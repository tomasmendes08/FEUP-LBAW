<div class="card border-dark mb-3">
    <div class="user_header_2 d-flex m-2 justify-content-between" style="">
        <div class="user_header_2_aux d-flex justify-content-between col-6 my-auto">
            <div class="d-flex">
                @if (file_exists(public_path('images/userProfile/' . $user->user_id . '.jpg')))
                    <img src="{{asset('images/userProfile/' . $user->user_id . '.jpg')}}" class="rounded-circle me-2" width="60">
                @else
                    <img src="{{asset('images/userProfile/null.jpg')}}" class="rounded-circle me-2" width="60">
                @endif
            <div class="mt-3 mb-3 px-3">
                <h6>{{$user->username}}</h6>
            </div>
            </div>

            <div class="mt-3 mb-3 px-3 d-flex justify-content-between">
                <span class="material-icons" style="font-size: 30px;">
                                    military_tech
                                </span>
                <h6 style="">
                    {{$user->reputation}} Rep.
                </h6>
            </div>
        </div>

        <div class="container px-0 d-flex flex-column" id="buttonsAwardUser">
            <a href="../users/{{$user->user_id}}" class="btn btn-dark m-1">View Profile</a>
            <form action="{{route('add_admin', ['user_id' => $user->user_id])}}" method="POST" class="d-flex flex-column">
                @csrf
                <input type="hidden" name="user_id" value="{{$user->user_id}}">
                <button type="submit" class="btn btn-success m-1">Give Admin</button>
            </form>
        </div>
    </div>
</div>
