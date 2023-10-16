@extends('layouts.app')

@section('title', 'Edit User Profile')

@section('content')

<section class="edit-profile-section bg-light">
    <div class="edit-profile-cont container-md px-md-0 px-3 mt-5 mb-5 d-flex justify-content-center">
        <div class="edit-profile col-12">
            <form method="POST" action="{{route('edit_profile', ['user_id' => $user->user_id])}}" enctype='multipart/form-data'>
                @csrf
                @method('PUT')
{{--                <div class="edit-profile-header p-3 py-5">--}}
{{--                </div>--}}

                <div class="edit-profile-header">
                    <img src="{{$header_image}}" class="img-fluid" alt="">
                </div>

                <span class="material-icons icon-edit-header">
                    add_a_photo
                </span>

                <div class="edit-profile-content cont px-4 d-md-flex">
                    <div class="edit-profile-content-left mb-4 col-md-4 col-12 d-flex flex-column align-items-center">
                        <img src="{{$profile_image}}" class="rounded-circle img-thumbnail img-fluid" />
                        <span class="material-icons icon-edit-pic">
                            add_a_photo
                        </span>
                        <div class="profile-names text-center">
                            @if ($user->name !== null)
                            <h4 class="name" style="font-weight:bolder;">
                                {{$user->name}}
                            </h4>
                            <h5 class="username" style="color: #ff8a60;">{{'@'.$user->username}}</h5>
                            @else
                            <h4 class="username" style="color: #ff8a60;">{{'@'.$user->username}}</h4>
                            @endif
                        </div>

                        <div class="profile-description mt-4">
                            <div class="profile-description-header d-flex justify-content-center"><h5 style="font-weight:bolder;">About Me</h5></div>
                            <textarea class="form-control mt-2" rows="8" cols="38" maxlength="220" name="description">@if (empty($user->description))"Gentlemen, you can't fight in here! This is the war room!"@else{{$user->description}}@endif
                            </textarea>
                        </div>
                        <div class="profile-spaces mt-4">
                            <div class="profile-spaces-header d-flex justify-content-center">
                                <h5 style="font-weight: bolder;">Spaces</h5>
                            </div>
                            <div class="profile-spaces-selected mt-3 d-flex flex-column align-items-center">
                                @foreach ($user->favourite_spaces as $favourite_space)
                                    @if ($favourite_space->space_name === "science")
                                        <button type="button" class="btn btn-outline-success rounded float-sm-end mb-3" onclick="location.href='/{{$favourite_space->space_name}}'">{{$favourite_space->space_name}}</button>
                                    @endif
                                    @if ($favourite_space->space_name === "technology")
                                        <button type="button" class="btn btn-outline-primary rounded float-sm-end mb-3" onclick="location.href='/{{$favourite_space->space_name}}'">{{$favourite_space->space_name}}</button>
                                    @endif
                                    @if ($favourite_space->space_name === "engineering")
                                        <button type="button" class="engine btn btn-outline-primary rounded float-sm-end mb-3" onclick="location.href='/{{$favourite_space->space_name}}'">{{$favourite_space->space_name}}</button>
                                    @endif
                                    @if ($favourite_space->space_name === "maths")
                                        <button type="button" class="btn btn-outline-danger rounded float-sm-end mb-3" onclick="location.href='/{{$favourite_space->space_name}}'">{{$favourite_space->space_name}}</button>
                                    @endif
                                @endforeach

                                <div class="other-spaces mt-2">
                                    <button type="button" class="btn btn-manage-spaces" data-bs-toggle="modal" data-bs-target="#favouriteSpacesModal">
                                        Manage Spaces
                                    </button>
                                    <div class="modal fade" id="favouriteSpacesModal" tabindex="-1" aria-labelledby="favouriteSpacesModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="favouriteSpacesModalLabel">Spaces</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    @if (in_array("science", $fav_spaces))
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="science" name="spaces[]" id="favourite_science" checked>
                                                        <label class="form-check-label" for="favourite_science">
                                                            science
                                                        </label>
                                                    </div>
                                                    @else
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="science" name="spaces[]" id="favourite_science">
                                                        <label class="form-check-label" for="favourite_science">
                                                            science
                                                        </label>
                                                    </div>
                                                    @endif
                                                    @if (in_array("technology", $fav_spaces))
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="technology" name="spaces[]" id="favourite_technology" checked>
                                                        <label class="form-check-label" for="favourite_technology">
                                                            technology
                                                        </label>
                                                    </div>
                                                    @else
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="technology" name="spaces[]" id="favourite_technology">
                                                        <label class="form-check-label" for="favourite_technology">
                                                            technology
                                                        </label>
                                                    </div>
                                                    @endif
                                                    @if (in_array("engineering", $fav_spaces))
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="engineering" name="spaces[]" id="favourite_engineering" checked>
                                                        <label class="form-check-label" for="favourite_engineering">
                                                            engineering
                                                        </label>
                                                    </div>
                                                    @else
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="engineering" name="spaces[]" id="favourite_engineering">
                                                        <label class="form-check-label" for="favourite_engineering">
                                                            engineering
                                                        </label>
                                                    </div>
                                                    @endif
                                                    @if (in_array("maths", $fav_spaces))
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="maths" name="spaces[]" id="favourite_maths" checked>
                                                        <label class="form-check-label" for="favourite_maths">
                                                            maths
                                                        </label>
                                                    </div>
                                                    @else
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="maths" name="spaces[]" id="favourite_maths">
                                                        <label class="form-check-label" for="favourite_maths">
                                                            maths
                                                        </label>
                                                    </div>
                                                    @endif
                                                </div>
                                                {{-- <div class="modal-div-buttons d-flex justify-content-end me-4 my-3">
                                                    <button type="button" class="btn btn-outline-dark close-new-spaces-button me-3" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-dark save-new-spaces-button">Save New Spaces</button>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <hr class="mb-5">
                    <div class="edit-profile-content-right col-md-8 col-12 mt-md-4">
                        <div class="edit-profile-content-right-header">
                            <h3 class="d-flex justify-content-center" style="font-weight:bolder;">Personal Details</h3>
                        </div>
                        <div class="row d-flex justify-content-center ms-4 mt-4">
                            <div class="edit-profile-name col-sm-5 col-12 me-sm-5">
                                <label for="name1" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name1" name="name" aria-describedby="name1" value="{{$user->name}}">
                            </div>
                            <div class="edit-profile-username col-sm-5 col-12 mt-sm-0 mt-4">
                                <label for="city1" class="form-label">City</label>
                                <input type="text" class="form-control" id="city1" name="city" aria-describedby="city1" value="{{$user->city}}">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center ms-4 mt-4">
                            <div class="edit-profile-name col-sm-5 col-12 me-sm-5">
                                <label for="email1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email1" name="email" aria-describedby="email1" value="{{$user->email}}" required>
                            </div>
                            <div class="edit-profile-username col-sm-5 col-12 mt-sm-0 mt-4">
                                <label for="username1" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username1" name="username" maxlength="18" aria-describedby="username1" value="{{$user->username}}" required>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center ms-4 mt-2">
                            @if ($errors->has('email'))
                                <span class="error col-sm-5 col-12 me-sm-5">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                            @if ($errors->has('username'))
                                <span class="error col-sm-5 col-12 mt-sm-0 mt-4">
                                    {{ $errors->first('username') }}
                                </span>
                            @endif
                        </div>
                        <div class="row d-flex justify-content-center ms-4 mt-4">
                            <div class="col-sm-5 col-12 me-sm-5">
                                <div>
                                    <label for="profile-pic" class="form-label">Profile picture</label>
                                    <input class="form-control" type="file" id="profile-pic" name="profile-pic">
                                </div>
                                @if (file_exists(public_path('images/userProfile/' . $user->user_id . '.jpg')))
                                    <div class="my-3 d-flex justify-content-between align-items-center">
                                        <label for="removeProfilePic" class="">Remove profile picture</label>
                                        <input type="checkbox" id="removeProfilePic" name="removeProfilePic">
                                    </div>
                                @endif
                            </div>
                            <div class="col-sm-5 col-12 mt-sm-0 mt-4">
                                <div>
                                    <label for="header-pic" class="form-label">Header picture</label>
                                    <input class="form-control" type="file" id="header-pic" name="header-pic">
                                </div>
                                @if (file_exists(public_path('images/userHeader/' . $user->user_id . '.jpg')))
                                    <div class="my-3 d-flex justify-content-between align-items-center">
                                        <label for="removeHeaderPic" class="">Remove header picture</label>
                                        <input type="checkbox" id="removeHeaderPic" name="removeHeaderPic">
                                    </div>
                                @endif
                            </div>
                        </div>


                        {{-- <div class="row d-flex justify-content-center ms-4 mt-4">
                            <div class="edit-profile-name col-sm-5 col-12 me-sm-5">
                                <label for="password1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password1" aria-describedby="password1" value="{{$user->password}}">
                            </div>
                            <div class="edit-profile-username col-sm-5 col-12 mt-sm-0 mt-4">
                                <label for="newpassword1" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="newpassword1" aria-describedby="newpassword1" value="">
                            </div>
                        </div> --}}
                        <div class="button-save-changes d-flex justify-content-end mt-5 me-xl-5 me-lg-4 me-4">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-update-profile" data-bs-toggle="modal" data-bs-target="#staticBackdropSaveProfileChanges">
                                Update Profile
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdropSaveProfileChanges" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropSaveProfileChangesLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            Do you really want to save your changes?
                                        </div>
                                        <div class="modal-div-buttons d-flex justify-content-end me-4 my-3">
                                            <button type="button" class="btn btn-outline-dark close-changes-button me-3" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-dark save-changes-button ">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="delete-account d-flex justify-content-end me-4">
                <form method="POST" action="{{route('delete_profile', ["user_id" => $user->user_id])}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn rounded " style="background-color: red; color:white;">Delete Account</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
