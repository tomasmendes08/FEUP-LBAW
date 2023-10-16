<div class="answer-container-{{$answer->answer_id}}">
    <div class="answer-box card mb-4" style="border: solid 1px #212529;">
        <div class="answer-header ms-3 d-flex flex-md-row flex-column">
            @if ($answer->owner != null)
                <div class="username mt-2 col-4 d-flex align-items-center" onclick="location.href='/users/{{$answer->owner->user_id}}'">
                    @if (file_exists(public_path('images/userProfile/' . $answer->owner->user_id . '.jpg')))
                        <img src="{{asset('images/userProfile/' . $answer->owner->user_id . '.jpg')}}" class="rounded-circle me-2" width="60">
                    @else
                        <img src="{{asset('images/userProfile/null.jpg')}}" class="rounded-circle me-2" width="60">
                    @endif
                    <h4 class="text-muted fw-bold">{{$answer->owner->username}}</h4>
                </div>
            @else
                <div class="username mt-2 col-4 d-flex align-items-center">
                    <img src="{{asset('images/userProfile/null.jpg')}}" class="rounded-circle me-2" width="60">
                    <h4 class="text-muted fw-bold">Deleted User</h4>
                </div>
            @endif
        </div>

        <div class="answer-title my-3">
            <div class="row container d-flex mt-1">
                <div class="answer-title-secondary-text my-3 col-12">
                    <h5>{{$answer->answer_body}}</h5>
                    @auth
                    @if (intval($answer->author) === Auth::id())
                    <div class="edit-answer-area" hidden>
                        <textarea class="form-control" id="form-textarea-edit-answer{{$answer->answer_id}}" rows="8">{{$answer->answer_body}}</textarea>
                        <div class="gap-2 d-flex justify-content-end mb-4">
                            <button class="btn btn-dark mt-3 ajax-edit-answer{{$answer->answer_id}}" type="submit">Update</button>
                            <button class="btn btn-outline-dark mt-3 edit-cancel-answer{{$answer->answer_id}}" type="button">Cancel</button>
                        </div>
                    </div>
                    @endif
                    @endauth
                </div>
            </div>
            <div class="justify-content-center d-flex">
                @if (file_exists(public_path('images/answer/' . $answer->answer_id . '.jpg')))
                    <img src="{{asset('images/answer/' . $answer->answer_id . '.jpg')}}" class="rounded mb-3" alt="">
                @endif
            </div>
            <div class="row">
                @auth
                <div class="answer-votes col-12 d-flex justify-content-center" data-id={{$answer->answer_id}}>
                    @if ($answer->userHasVotedAnswer($answer->answer_id, Auth::id()) !== null)
                        @if ($answer->userHasVotedAnswer($answer->answer_id, Auth::id())->vote === false)
                        <span class="left material-icons me-sm-4 me-1 downvote_answer_icon" style="color: #fd5d22;">
                            arrow_drop_down
                        </span>
                        @else
                        <span class="left material-icons me-sm-4 me-1 downvote_answer_icon">
                            arrow_drop_down
                        </span>
                        @endif

                        <div class="answer-number-of-votes">
                            {{$answer->votes()}}
                        </div>

                        @if ($answer->userHasVotedAnswer($answer->answer_id, Auth::id())->vote === true)
                        <span class="right material-icons ms-sm-4 ms-1 upvote_answer_icon" style="color: #fd5d22;">
                            arrow_drop_up
                        </span>
                        @else
                        <span class="right material-icons ms-sm-4 ms-1 upvote_answer_icon">
                            arrow_drop_up
                        </span>
                        @endif
                    @else
                        <span class="left material-icons me-sm-4 me-1 downvote_answer_icon">
                            arrow_drop_down
                        </span>
                        <div class="answer-number-of-votes">
                            {{$answer->votes()}}
                        </div>
                        <span class="right material-icons ms-sm-4 ms-1 upvote_answer_icon">
                            arrow_drop_up
                        </span>
                    @endif
                </div>

                @endauth

                @guest
                <div class="answer-votes d-flex justify-content-center" data-id={{$answer->answer_id}}>
                    <span class="left material-icons me-sm-4 me-1 downvote_answer_icon">
                        arrow_drop_down
                    </span>
                    <div class="answer-number-of-votes">
                        {{$answer->votes()}}
                    </div>
                    <span class="right material-icons ms-sm-4 ms-1 upvote_answer_icon">
                        arrow_drop_up
                    </span>
                </div>
                @endguest
            </div>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <div class="ms-1 text-muted d-flex justify-content-start fw-bold">
                <button class="btn btn-outline-dark number-of-comments" onclick="location.href='/question/{{$answer->question_id}}'">
                    Go to question
                </button>
            </div>

            <div class="text-end text-muted fw-bold">
                {{$answer->answer_date}}
            </div>

            <div class="answer-options dropup">
                <span class="material-icons more-options me-1" data-bs-toggle="dropdown" aria-expanded="false">
                    more_horiz
                </span>
                <div class="answer-options-buttons dropdown-menu" data-id="{{$answer->answer_id}}" style="border: 2px solid;">
                    <button type="button"
                            class="btn d-flex mt-1 delete-answer-button-reports"
                            style="border: 0px;"
                            data-id="{{$answer->answer_id}}">
                        <span class="material-icons delete-icon me-2">
                            delete
                        </span>
                        Delete
                    </button>
                    <button type="button"
                            class="btn d-flex mt-1 unreport-answer-button-reports"
                            style="border: 0px;"
                            data-id="{{$answer->answer_id}}">
                        <span class="material-icons delete-icon me-2">
                            flag
                        </span>
                        Unreport
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
