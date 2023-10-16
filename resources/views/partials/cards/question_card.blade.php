<div class="question-card-container col-12 mt-4">
    <div class="card mb-4 " style="border: solid 3px #212529;">
        <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
            @if ($question->owner != null)
                <div class="username mt-2 d-flex align-items-center col-6" onclick="location.href='/users/{{$question->owner->user_id}}'">
                    @if (file_exists(public_path('images/userProfile/' . $question->owner->user_id . '.jpg')))
                        <img src="{{'../images/userProfile/' . $question->owner->user_id . '.jpg'}}" class="rounded-circle me-2" width="60">
                    @else
                        <img src="../images/userProfile/null.jpg" class="rounded-circle me-2" width="60">
                    @endif
                    <h4>{{$question->owner->username}}</h4>
                </div>
            @else
                <div class="username mt-2 d-flex align-items-center col-6">
                    @if (file_exists(public_path('images/userProfile/null.jpg')))
                        <img src="{{'../images/userProfile/null.jpg'}}" class="rounded-circle me-2" width="60">
                    @else
                        <img src="../images/userProfile/null.jpg" class="rounded-circle me-2" width="60">
                    @endif
                    <h4>Deleted User</h4>
                </div>
            @endif
            <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                @if ($question->space->space_name === "science")
                    <button type="button" class="btn btn-outline-success rounded float-sm-end me-3" onclick="location.href='/{{$question->space->space_name}}'">{{$question->space->space_name}}</button>
                @endif
                @if ($question->space->space_name === "technology")
                    <button type="button" class="btn btn-outline-primary rounded float-sm-end me-3" onclick="location.href='/{{$question->space->space_name}}'">{{$question->space->space_name}}</button>
                @endif
                @if ($question->space->space_name === "engineering")
                    <button type="button" class="engine btn btn-outline-primary rounded float-sm-end me-3" onclick="location.href='/{{$question->space->space_name}}'">{{$question->space->space_name}}</button>
                @endif
                @if ($question->space->space_name === "maths")
                    <button type="button" class="btn btn-outline-danger rounded float-sm-end me-3" onclick="location.href='/{{$question->space->space_name}}'">{{$question->space->space_name}}</button>
                @endif
            </div>
        </div>

        <div class="question-title mt-3">

            <div class="question-title-text row mx-2 mt-3 text-start" onclick="location.href='/question/{{$question->question_id}}'">
                <h3 class="fw-bold">{{$question->question_title}}</h3>
            </div>

            @auth
            <div class="votes mt-2 d-flex justify-content-center" data-id={{$question->question_id}}>
                @if ($question->userHasVotedQuestion($question->question_id, Auth::id()) !== null)
                    @if ($question->userHasVotedQuestion($question->question_id, Auth::id())->vote === false)
                    <span class="left material-icons me-4 downvote_question_icon" style="color: #fd5d22;">
                        arrow_drop_down
                    </span>
                    @else
                    <span class="left material-icons me-4 downvote_question_icon">
                        arrow_drop_down
                    </span>
                    @endif

                    <div class="number-of-votes">
                        {{$question->votes()}}
                    </div>

                    @if ($question->userHasVotedQuestion($question->question_id, Auth::id())->vote === true)
                    <span class="right material-icons ms-4 upvote_question_icon" style="color: #fd5d22;">
                        arrow_drop_up
                    </span>
                    @else
                    <span class="right material-icons ms-4 upvote_question_icon">
                        arrow_drop_up
                    </span>
                    @endif
                @else
                    <span class="left material-icons me-4 downvote_question_icon">
                        arrow_drop_down
                    </span>
                    <div class="number-of-votes">
                        {{$question->votes()}}
                    </div>
                    <span class="right material-icons ms-4 upvote_question_icon">
                        arrow_drop_up
                    </span>
                @endif
            </div>
            @endauth

            @guest
            <div class="votes mt-2 d-flex justify-content-center" data-id={{$question->question_id}}>
                <span class="left material-icons me-4 downvote_question_icon">
                    arrow_drop_down
                </span>
                <div class="number-of-votes">
                    {{$question->votes()}}
                </div>
                <span class="right material-icons ms-4 upvote_question_icon">
                    arrow_drop_up
                </span>
            </div>
            @endguest

        </div>
        <div class="card-footer d-flex align-items-center">
            <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start fw-bold">
                <button type="button" class="nr_answers btn btn-outline-dark rounded" >
                    @php
                        $nmr_answers = $question->answers->count()
                    @endphp
                    {{
                        $nmr_answers
                    }}
                    @if ($nmr_answers === 1)
                        {{ 'answer' }}
                    @else
                        {{ 'answers' }}
                    @endif

                </button>
            </div>
            @if (!(intval($question->author) === Auth::id()))
            <div class="col-6 ms-md-4 ms-sm-2 ms-0 text-end text-sm-start text-muted fw-bold">
                {{$question->question_date}}
            </div>
            <div class="col-1 me-2 d-none d-sm-block" data-id={{$question->question_id}}>
                <span class="question-report-icon material-icons me-1">
                    flag
                </span>
            </div>
            @else
            <div class="col-6 ms-md-5 ms-0 text-end text-muted fw-bold">
                {{$question->question_date}}
            </div>
            @endif
        </div>
    </div>
</div>
