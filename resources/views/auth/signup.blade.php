@extends('layouts.app')

@section('content')
    <div class="signup-card my-5 mx-sm-5 mx-4 row d-flex justify-content-center">
        <div class="welcome-message col-lg-4 d-flex justify-content-center align-items-center flex-column" style="background: url('../images/signup.jpg')">
            <div class="welcome-discussly d-flex mt-4 ms-1">
                <h4 class="">Welcome to Discussly</h4>
                <!--<h2 class="">&nbspDiscussly</h2>-->
            </div>
            <h5 class="mt-3">Join our community!</h5>
            <div class="check-discussly-socials flex-end my-3">
                <button type="button" class="btn rounded-circle" style="border: 2px solid white;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16" style="color: white;">
                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="signup-form col-lg-6 ">
            <div class="signup-header d-flex justify-content-center mt-4">
                <h3 class="title" style="font-weight:bolder;">
                    Sign Up
                </h3>
            </div>
            <form class="mt-3" method="POST" action="{{route('signup')}}" enctype='multipart/form-data'>
                @csrf
                {{-- <div class="signup-profile-pic mb-4 d-flex flex-column align-items-center justify-content-center">
                    <img src="../images/default.png" class="rounded-circle img-thumbnail" />
                    <div class="mt-3">
                        <input type="file" id="register-profile-pic" class="form-control-file" hidden>
                        <label for="register-profile-pic" class="button-profile-pic-upload btn btn-dark d-flex">
                            Profile Pic
                            <span class="material-icons ms-2" style="font-size: 23px;">
                                add_a_photo
                            </span>
                        </label>
                    </div>
                </div> --}}

                <div class="signup-form-container container">
                    <div class="input-group flex-nowrap mt-4">
                        <span class="input-group-text" id="addon-wrapping">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Name" aria-label="Name" value="{{old('name')}}" name="name" aria-describedby="addon-wrapping">

                    </div>

                    <div class="input-group flex-nowrap mt-4">
                        <span class="input-group-text" id="addon-wrapping">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                              </svg>
                        </span>
                        <input type="text" class="form-control" placeholder="City" aria-label="City" value="{{old('city')}}" name="city" aria-describedby="addon-wrapping">

                    </div>

                    <div class="input-group flex-nowrap mt-4">
                        <span class="input-group-text" id="addon-wrapping">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                            </svg>
                        </span>
                        <input type="email" class="form-control" placeholder="Email" aria-label="Email" value="{{old('email')}}" name="email" aria-describedby="addon-wrapping" required>
                    </div>
                    @if ($errors->has('email'))
                        <span class="error mt-2">
                            {{ $errors->first('email') }}
                        </span>
                    @endif

                    <div class="input-group flex-nowrap mt-4">
                        <span class="input-group-text" id="addon-wrapping">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" value="{{old('username')}}" name="username" aria-describedby="addon-wrapping" required>
                    </div>
                    @if ($errors->has('username'))
                    <span class="error">
                        {{ $errors->first('username') }}
                    </span>
                    @else
                        <div id="usernameHelpBlock" class="form-text mt-1 text-muted">
                            Your username must have at most 18 characters.
                        </div>
                    @endif

                    <div class="input-group flex-nowrap mt-4">
                        <span class="input-group-text" id="addon-wrapping">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                            </svg>
                        </span>
                        <input type="password" class="form-control" placeholder="Password" aria-label="Password" value="{{old('password')}}" name="password" aria-describedby="addon-wrapping" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$" required>
                    </div>
                    <div class="input-group flex-nowrap mt-4">
                        <span class="input-group-text" id="addon-wrapping">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                            </svg>
                        </span>
                        <input type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="Confirm password" required>
                    </div>
                    @if ($errors->has('password'))
                        <span class="error">
                            {{ $errors->first('password') }}
                        </span>
                    @else
                        <div id="passwordHelpBlock" class="form-text mt-1 text-muted">
                            Your password must have at least 6 characters, 1 digit and 1 special character.
                        </div>
                    @endif

                    <div class="input-group flex-nowrap">
                        <textarea class="form-control w-75 mt-4" placeholder="Small description of yourself" value="{{old('description')}}" name="description" id="exampleFormControlTextarea1" rows="4" maxlength="220"></textarea>
                    </div>

                    @if ($errors->has('description'))
                        <span class="error">
                            {{ $errors->first('description') }}
                        </span>
                    @else
                        <div id="descriptionHelpBlock" class="form-text mt-1 text-muted">
                            Your description must have at most 220 characters.
                        </div>
                    @endif

                    <div class="my-3">
                        <label for="profile-pic" class="profile-pic-label">Profile picture</label>
                        <input class="form-control" type="file" id="profile-pic" name="profile-pic">
                    </div>
                    <div class="my-3">
                        <label for="header-pic" class="header-pic-label">Header picture</label>
                        <input class="form-control" type="file" id="header-pic" name="header-pic">
                    </div>

                    <div class="submit-signup d-flex justify-content-center my-5">
                        <button id="sign-up-submit" type="submit" class="btn btn-primary w-50" style="background-color: #fd5d22; border-color: #fd5d22;">Sign Up</button>
                    </div>
                    <div class="row my-2">
                        <div class="col"><hr></div>
                        <div class="col-auto">OR</div>
                        <div class="col"><hr></div>
                    </div>

                    <div class="row mb-4"></div>
                    <div class="row mb-4 d-flex justify-content-center">
                        <button type="button" id="signup_google" class="btn btn-lg btn-outline-primary w-75 fs-5" style="color: white; border-color: #fd5d22; background-color: #fd5d22">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-google mb-1 me-1" viewBox="0 0 16 16">
                            <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                        </svg>
                        Sign Up
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
