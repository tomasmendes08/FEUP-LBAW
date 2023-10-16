@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<section class="user-profile bg-light">
    <div class="user-profile-cont container-md px-md-0 px-3 my-5 d-flex justify-content-center">
            <div class="user-profile col-12">
                <div class="user-profile-header">
                    <img src="{{$header_image}}" class="img-fluid" alt="">
                </div>
                <div class="user-profile-content d-lg-flex cont px-4">
                    <div class="user-profile-content-left col-lg-4 col-12 d-flex flex-column align-items-center ">
                        <img src="{{$profile_image}}" class="rounded-circle img-thumbnail img-fluid" />
                        <div class="profile-names text-center mt-2">
                            @if ($user->name !== null)
                                <h4 class="name" style="font-weight:bolder;">
                                    {{$user->name}}
                                </h4>
                                <h5 class="username" style="color: #ff8a60;">{{'@'.$user->username}}</h5>
                            @else
                                <h4 class="username" style="color: #ff8a60;">{{'@'.$user->username}}</h4>
                            @endif
                            <div class="reputation mt-3 mb-2 d-flex justify-content-center">
                                <span class="material-icons" style="font-size: 30px;">
                                    military_tech
                                </span>
                                <h5 style="">
                                    {{$user->reputation}} Rep.
                                </h5>
                            </div>
                            @if ($user->isAdmin())
                                <div class="reputation mt-3 mb-2 d-flex justify-content-center">
                                    <span class="material-icons" style="font-size: 30px;">
                                        admin_panel_settings
                                    </span>
                                    <h5 style="">
                                        Admin
                                    </h5>
                                </div>
                            @endif
                        </div>
                        @auth
                        @if ($user->user_id === Auth::id())
                        <div class="edit-profile-button mt-3">
                            <button type="button" class="btn btn-edit-profile d-flex justify-content-center" onclick="location.href='/users/{{$user->user_id}}/edit_profile'">
                                Edit Profile
                            </button>
                        </div>
                        @endif
                        @endauth
                        <div class="profile-description mt-5">
                            <div class="profile-description-header d-flex justify-content-center"><h5 style="font-weight:bolder;">About Me</h5></div>
                            <p class="information mt-2 text-justify col-10 offset-1">
                            @if (empty($user->description))
                            "Gentlemen, you can't fight in here! This is the war room!"
                            @else
                            {{$user->description}}
                            @endif
                            </p>
                        </div>
                        @if (count($user->favourite_spaces) !== 0)
                        <div class="profile-spaces mt-4">
                            <div class="profile-spaces-header d-flex justify-content-center">
                                <h5 style="font-weight: bolder;">Spaces</h5>
                            </div>
                            <div class="profile-spaces-selected mt-3 mb-2 d-flex flex-column align-items-center">
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

                            </div>
                        </div>
                        @endif
                    </div>
                    <hr class="mb-5">
                    <div class="user-profile-content-right col-lg-8 ms-lg-4 col-12 mt-lg-4 mb-5">
                        <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
                            <li class="col-4 d-flex justify-content-center nav-item" role="presentation">
                                <button class="button-tab-filter nav-link active" id="pills-questions-tab" data-bs-toggle="pill" data-bs-target="#pills-questions" type="button" role="tab" aria-controls="pills-questions" aria-selected="true">Questions</button>
                            </li>
                            <li class="col-4 d-flex justify-content-center nav-item" role="presentation">
                                <button class="button-tab-filter nav-link" id="pills-answers-tab" data-bs-toggle="pill" data-bs-target="#pills-answers" type="button" role="tab" aria-controls="pills-answers" aria-selected="false">Answers</button>
                            </li>
                            <li class="col-4 d-flex justify-content-center nav-item" role="presentation">
                                <button class="button-tab-filter nav-link" id="pills-comments-tab" data-bs-toggle="pill" data-bs-target="#pills-comments" type="button" role="tab" aria-controls="pills-comments" aria-selected="false">Comments</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-questions" role="tabpanel" aria-labelledby="pills-questions-tab">
                                @foreach ($user->questions as $question)
                                    @include('partials.cards.question_card', ['question' => $question])
                                @endforeach
                            </div>
                            <div class="tab-pane fade show" id="pills-answers" role="tabpanel" aria-labelledby="pills-answers-tab">
                                @foreach ($user->answers as $answer)
                                    <div class="mt-4">
                                        @include('partials.cards.answer_card_profile', ['answer' => $answer])
                                    </div>
                                @endforeach
                            </div>
                            <div class="tab-pane fade show" id="pills-comments" role="tabpanel" aria-labelledby="pills-comments-tab">
                                @foreach ($user->comments as $comment)
                                    @include('partials.cards.comment_card', ['comment' => $comment])
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</section>


@endsection
