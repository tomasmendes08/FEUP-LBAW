<div class="user-profile-card-container">
    <div class="user-profile-card-box card" style="border: 3px solid;">
        <div class="user-profile-card-header mb-3 ms-3 d-flex row" >
            <div class="user-profile-pic col-1 mt-2 d-flex align-items-center" onclick="location.href='/users/{{$user->user_id}}'">
                @if (file_exists(public_path('images/userProfile/' . $user->user_id . '.jpg')))
                    <img src="{{asset('images/userProfile/' . $user->user_id . '.jpg')}}" class="rounded-circle me-2" width="60">
                @else
                    <img src="{{asset('images/userProfile/null.jpg')}}" class="rounded-circle me-2" width="60">
                @endif
            </div>
            <div class="name-username col-sm-6 col-8 mt-4 ms-xl-2 ms-md-3 ms-4" onclick="location.href='/users/{{$user->user_id}}'">
                <h3 class="fw-bold">{{$user->name}}</h3>
                <h4 class="" style="color: #fd5d22;">{{'@'.$user->username}}</h4>
            </div>
            <div class="reputation col-sm-4 col-6 d-flex justify-content-sm-end align-items-sm-center justify-content-center">
                <span class="material-icons" style="font-size: 30px;">
                    military_tech
                </span>
                <h4 class="fw-bold">
                    {{$user->reputation}} Rep.
                </h4>
            </div>
        </div>
    </div>
</div>