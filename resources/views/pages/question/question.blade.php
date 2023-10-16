@extends('layouts.app')

@section('title', 'Question')

@section('content')
    <div class="question-page-container">
        <section class="question-and-answer-page container" id="question-page-top">
            <div class="question-card-container questions mt-5" style="">
                <div class="question col-12 mt-4">
                    <div class="card card-question mb-5" style="border: solid 3px #212529;">
                        <div class="row mt-2 me-3">
                            <div class="question-header ms-3 d-flex flex-sm-row flex-column">
                                @if ($question->owner != null)
                                    <div class="username mt-2 d-flex align-items-center col-6"
                                         onclick="location.href='/users/{{$question->owner->user_id}}'">
                                        @if (file_exists(public_path('images/userProfile/' . $question->owner->user_id . '.jpg')))
                                            <img
                                                src="{{asset('images/userProfile/' . $question->owner->user_id . '.jpg')}}"
                                                class="rounded-circle me-2" width="60">
                                        @else
                                            <img src="{{asset('images/userProfile/null.jpg')}}"
                                                 class="rounded-circle me-2" width="60">
                                        @endif
                                        <h4 class="text-muted fw-bold">{{$question->owner->username}}</h4>
                                    </div>
                                @else
                                    <div class="username mt-2 d-flex align-items-center col-6">
                                        <img src="{{asset('images/userProfile/null.jpg')}}" class="rounded-circle me-2"
                                             width="60">
                                        <h4 class="text-muted fw-bold">Deleted User</h4>
                                    </div>
                                @endif
                                <div
                                    class="question-space mt-3 col-6 d-flex align-items-sm-end align-items-start flex-column"
                                    style="">
                                    @if ($question->space->space_name === "science")
                                        <button type="button" class="btn btn-outline-success rounded float-sm-end me-3"
                                                onclick="location.href='/{{$question->space->space_name}}'">{{$question->space->space_name}}</button>
                                    @endif
                                    @if ($question->space->space_name === "technology")
                                        <button type="button" class="btn btn-outline-primary rounded float-sm-end me-3"
                                                onclick="location.href='/{{$question->space->space_name}}'">{{$question->space->space_name}}</button>
                                    @endif
                                    @if ($question->space->space_name === "engineering")
                                        <button type="button"
                                                class="engine btn btn-outline-primary rounded float-sm-end me-3"
                                                onclick="location.href='/{{$question->space->space_name}}'">{{$question->space->space_name}}</button>
                                    @endif
                                    @if ($question->space->space_name === "maths")
                                        <button type="button" class="btn btn-outline-danger rounded float-sm-end me-3"
                                                onclick="location.href='/{{$question->space->space_name}}'">{{$question->space->space_name}}</button>
                                    @endif
                                </div>
                            </div>
                            @auth
                                @if ($question->owner != null)
                                    @if (Auth::id() === $question->owner->user_id)
                                        <div class="row">
                                            <div
                                                class="question-header-icons mt-2 ms-4 d-sm-flex d-none justify-content-end">
                                                <span class="material-icons edit-icon" style="font-size: 25px;"
                                                      onclick="location.href='/edit_question/{{$question->question_id}}'">
                                                    mode_edit
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            @endauth
                        </div>

                        <div class="question-title mt-3">

                            <div class="question-title-text row me-2 ms-1 mt-3 text-start"
                                 onclick="location.href=''">
                                <h3 class="fw-bold">{{$question->question_title}}</h3>
                            </div>
                            <br>
                            <div class="question-title-secondary-text text-start text-muted me-2 ms-3">
                                <h5>{{$question->question_body}}</h5>
                            </div>

                            @if (file_exists(public_path('images/question/' . $question->question_id . '.jpg')))
                                <div class="px-3 mt-3">
                                    <img src="{{asset('images/question/' . $question->question_id . '.jpg')}}"
                                         class="rounded mx-auto d-block img-fluid" alt="" style="max-height:30em">
                                </div>
                            @endif

                            @auth
                                <div class="votes d-flex justify-content-center my-3"
                                     data-id={{$question->question_id}}>

                                    @if ($question->userHasVotedQuestion($question->question_id, Auth::id()) !== null)
                                        @if ($question->userHasVotedQuestion($question->question_id, Auth::id())->vote === false)
                                            <span class="left material-icons me-4 downvote_question_icon"
                                                  style="color: #fd5d22;">
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
                                            <span class="right material-icons ms-4 upvote_question_icon"
                                                  style="color: #fd5d22;">
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
                                <div class="votes d-flex justify-content-center my-3"
                                     data-id={{$question->question_id}}>

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
                        <div class="card-footer d-flex flex-row">
                            <div class="col-11 ms-md-2 ms-1 text-muted" style="font-weight:bolder;">
                                {{$question->question_date}}
                            </div>
                            <div class="col-1 d-sm-flex justify-content-sm-center ms-xxl-4 ms-xl-3 ms-lg-2 ms-0">
                                @if ($question->owner != null)
                                    @auth
                                        @if (Auth::id() === $question->owner->user_id || !empty(Auth::user()->isAdmin(Auth::id())))
                                            <form action="/question/{{$question->question_id}}/delete"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="material-icons delete-icon d-sm-block d-none"
                                                        style="font-size: 25px; border: 0px;">
                                                    delete
                                                </button>
                                            </form>
                                        @else
                                            <div data-id={{$question->question_id}}>
                                        <span class="question-report-icon material-icons d-sm-block d-none">
                                            flag
                                        </span>
                                            </div>
                                        @endif
                                    @endauth
                                    <span class="material-icons d-sm-none me-1">
                                    more_horiz
                                </span>
                                @else
                                    <div data-id={{$question->question_id}}>
                                    <span class="question-report-icon material-icons d-sm-block d-none">
                                        flag
                                    </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


                <div class="division-question-answers my-5" style="">
                    <hr class="rounded" style="border-radius: 3px; border: solid 3px;">
                    <div class="row d-flex mt-5">
                        <div class="nr_answers col-5 offset-1" style="">
                            <h5 id="question-nmr-answers{{$question->question_id}}" class="fw-bold">
                                @php
                                    $nmr_answers = $question->answers->count();
                                @endphp
                                {{$nmr_answers}}
                                @if ($nmr_answers === 1)
                                    {{'answer'}}
                                @else
                                    {{'answers'}}
                                @endif
                            </h5>
                        </div>
                        <div class="add-answer col-5 d-flex justify-content-end">
                            <a class="btn btn-add-answer" href="#submit-your-answer">Add Answer</a>
                        </div>
                    </div>
                </div>

                <div class="answers-space">
                    <div id="answer-cards" class="answers">
                        @foreach ($most_upvotes_answers as $answer)
                            @include('partials.cards.answer_card', ['answer' => $answer])
                            <hr class="my-5 answer-div-{{$answer->answer_id}}">
                        @endforeach
                    </div>
                    @auth
                        <form id="submit-your-answer" class="give-your-answer mt-5 mb-5">
                            <!-- enctype='multipart/form-data' -->
                            @csrf
                            <input type="text" id="answer_question_id" value="{{$question->question_id}}" hidden>
                            <input type="text" id="answer_author" value="{{Auth::id()}}" hidden>
                            <div class="give-your-answer-header col-11 ms-3">
                                <label for="question-text-area" class="form-label"><h4 style="font-weight: bolder;">
                                        Give
                                        your answer</h4></label>
                                <textarea class="form-control mt-4" id="form-textarea-answer" rows="8"
                                          placeholder="Write your answer here!"></textarea>
                            </div>
                            <div class="d-md-flex justify-content-between align-items-center col-11 ms-3">
                                <button class="btn-submit-answer btn rounded mt-3" id="ajax-submit-answer"
                                        type="submit">Submit Answer
                                </button>
                                {{--                    <div class="my-3 d-inline-flex justify-content-between align-items-center">--}}
                                {{--                        <label for="image" class="form-label align-self-end mb-0"><h5 style="font-weight: bolder;">Image:</h5></label>--}}
                                {{--                        <input class="form-control ms-2" type="file" id="add_answer_image" name="image">--}}
                                {{--                    </div>--}}
                            </div>
                            <div class="question-page-back-top col-6 offset-6 d-flex justify-content-end">
                                <a class="btn btn-dark my-5" href=#question-page-top>Back to question</a>
                            </div>
                        </form>
                    @endauth
                </div>
        </section>
    </div>

@endsection
