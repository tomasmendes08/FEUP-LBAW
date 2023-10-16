
<div class="answer-container">
    <div class="answer-box card mb-4" @if ($answer->highlight === true) style="box-shadow:0em 0em 0em 0.4em #fd5d22;" @endif>
        <div class="answer-header ms-3 d-flex flex-md-row flex-column">
            <div class="username mt-2 col-4 d-flex align-items-center" onclick="location.href='/users/{{$answer->owner->user_id}}'">
                @if (file_exists(public_path('images/userProfile/' . $answer->owner->user_id . '.jpg')))
                    <img src="{{asset('images/userProfile/' . $answer->owner->user_id . '.jpg')}}" class="rounded-circle me-2" width="60">
                @else
                    <img src="{{asset('images/userProfile/null.jpg')}}" class="rounded-circle me-2" width="60">
                @endif
                <h4 class="text-muted fw-bold">{{$answer->owner->username}}</h4>
            </div>
            @if ($answer->highlight === true)
            <div class='answer-space-best-answer mt-md-2 mt-3 col-7 d-flex align-items-md-center justify-content-md-end align-items-start' style='font-weight:bolder; font-size:20px;'>Best Answer<span class='material-icons ms-1' style='font-size: 30px; color: #fd5d22;'>star</span></div>
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
        <div class="card-footer d-flex align-items-center">
            <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start fw-bold">
                <button class="btn btn-outline-dark number-of-comments" onclick="location.href='/question/{{$answer->question_id}}'">
                    Go to question
                </button>
            </div>
            
            @if ($answer->owner->user_id == Auth::id())
            <div class="col-sm-7 col-6 text-end text-muted fw-bold">
                {{$answer->answer_date}}
            </div>
            @else
            <div class="col-6 text-end text-sm-start text-muted fw-bold">
                {{$answer->answer_date}}
            </div>
            <div class="col-1 ms-0 d-none d-sm-flex justify-content-sm-center">
                <span class="report-icon material-icons">
                    flag
                </span>
            </div>
            @endif
        </div>
    </div>
    
</div>
