@extends('layouts.app')

@section('title', 'Admin')

@section('content')

<div class="container mw-2">
    <h1 class="mx-auto my-5 text-center">Administration Area</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light col-lg">
        <div class="container">
            <ul class="nav nav-pills row mx-auto" id="AdminAreaNavbar">
                <li class="nav-item col-auto">
                    <button class="button-tab-filter nav-link active" id="pills-award-tab" data-bs-toggle="pill" data-bs-target="#pills-award" type="button" role="tab" aria-controls="pills-award" aria-selected="true">Award</button>
                </li>
                <li class="nav-item col-auto">
                    <button class="button-tab-filter nav-link" id="pills-report-tab" data-bs-toggle="pill" data-bs-target="#pills-report" type="button" role="tab" aria-controls="pills-report" aria-selected="false">Report</button>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container my-3 tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-award" role="tabpanel" aria-labelledby="pills-award-tab">
            <div class="space-page-feed py-5 bg-light" style="">
                <div class="feed-awards container">
                    <div class="row awards">
                        @foreach ($awarded_users as $user)
                            @include('partials.cards.admin_award_card', ['user' => $user])
                        @endforeach
                    </div>
                    <div class="justify-content-center loading-awards-div my-5" style="display: none;">
                        <div class="spinner-border" role="status">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-report" role="tabpanel" aria-labelledby="pills-report-tab">
            <div class="space-page-feed py-5 bg-light" style="">
                <div class="feed-reported-questions container">
                    <div class="row reported-questions">
                        @foreach ($reported_questions as $question)
                            @include('partials.cards.question_card_report', ['question' => $question])
                        @endforeach
                    </div>
                    <div class="justify-content-center loading-reported-questions-div my-5" style="display: none;">
                        <div class="spinner-border" role="status">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
