@extends('layouts.app')

@section('title', 'Space')

@section('content')

        <section class="space-header jumbotron text-center mt-5">
            <div class="container">
                @if ($space->space_name === "science")
                    <h1 class="jumbotron-heading fw-bold">Science Space</h1>
                    <p class="lead text-muted my-4">“Science is not only a disciple of reason but also one of romance and passion.” – Stephen Hawking</p>
               @endif
               @if ($space->space_name === "technology")
                    <h1 class="jumbotron-heading fw-bold">Technology Space</h1>
                    <p class="lead text-muted my-4">“The advance of technology is based on making it fit in so that you don't really even notice it, so it's part of everyday life.” - Bill Gates
               @endif
               @if ($space->space_name === "engineering")
                    <h1 class="jumbotron-heading fw-bold">Engineering Space</h1>
                    <p class="lead text-muted my-4">“Engineers like to solve problems. If there are no problems handily available, they will create their own problems." - Scott Adams</p>
               @endif
               @if ($space->space_name === "maths")
                    <h1 class="jumbotron-heading fw-bold">Maths Space</h1>
                    <p class="lead text-muted my-4">"Pure mathematics is, in its way, the poetry of logical ideas." - Albert Einstein</p>
               @endif
                <p>
                    @guest
                        <a href="/signup" class="btn btn-add-question my-2">Add Question</a>
                    @endguest
                    @auth
                        <a href="/add_question" class="btn btn-add-question my-2">Add Question</a>
                    @endauth
                </p>
            </div>
            <br>
            <ul class="nav nav-pills mb-3 container px-0" id="pills-tab" role="tablist">
                <li class="col-6 d-flex justify-content-center nav-item" role="presentation">
                    <button class="button-tab-filter nav-link active" id="pills-recent-tab" data-bs-toggle="pill" data-bs-target="#pills-recent" type="button" role="tab" aria-controls="pills-recent" aria-selected="true">Recent</button>
                </li>
                {{-- <li class="col-4 d-flex justify-content-center nav-item" role="presentation">
                    <button class="button-tab-filter nav-link" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="false">Popular</button>
                </li> --}}
                <li class="col-6 d-flex justify-content-center nav-item" role="presentation">
                    <button class="button-tab-filter nav-link" id="pills-upvotes-tab" data-bs-toggle="pill" data-bs-target="#pills-upvotes" type="button" role="tab" aria-controls="pills-upvotes" aria-selected="false">Most Upvotes</button>
                </li>
            </ul>
            <div class="tab-content questions" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-recent" role="tabpanel" aria-labelledby="pills-recent-tab">
                    <div class="space-page-feed py-5 bg-light" style="">
                        <div class="feed-recent container">
                            <div class="row questions-recent">
                                @foreach ($space_recent_questions as $question)
                                    @include('partials.cards.question_card', ['question' => $question])
                                @endforeach
                            </div>
                            <div class="container justify-content-center read-more-recent-div my-5" style="display: flex;">
                                <div class="recent-question-page" data-id=1></div>
                                <button type="button" class="btn btn-dark rounded d-flex justify-content-center" id="read-more-recent" data-id={{$space->space_name}}>
                                    <span class="material-icons me-1">
                                        add_box
                                    </span>
                                    Read More
                                </button>
                            </div>
                            <div class="justify-content-center loading-recent-div my-5" style="display: none;">
                                <div class="spinner-border" role="status">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="tab-pane fade" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                    <div class="space-page-feed py-5 bg-light" style="">
                        <div class="feed-popular container">
                            <div class="row questions-popular">
                                @foreach ($space_popular_questions as $question)
                                    @include('partials.cards.question_card', ['question' => $question])
                                @endforeach
                            </div>
                            <div class="container justify-content-center read-more-popular-div my-5" style="display: flex;">
                                <div class="popular-question-page" data-id=1></div>
                                <button type="button" class="btn btn-dark rounded d-flex justify-content-center" id="read-more-popular" data-id={{$space->space_name}}>
                                    <span class="material-icons me-1">
                                        add_box
                                    </span>
                                    Read More
                                </button>
                            </div>
                            <div class="justify-content-center loading-popular-div my-5" style="display: none;">
                                <div class="spinner-border" role="status">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="tab-pane fade" id="pills-upvotes" role="tabpanel" aria-labelledby="pills-upvotes-tab">
                    <div class="space-page-feed py-5 bg-light" style="">
                        <div class="feed-upvotes container">
                            <div class="row questions-upvotes">
                                @foreach ($space_most_upvotes_questions as $question)
                                    @include('partials.cards.question_card', ['question' => $question])
                                @endforeach
                            </div>
                            <div class="container justify-content-center read-more-upvotes-div my-5" style="display: flex;">
                                <div class="upvotes-question-page" data-id=1></div>
                                <button type="button" class="btn btn-dark rounded d-flex justify-content-center" id="read-more-upvotes" data-id={{$space->space_name}}>
                                    <span class="material-icons me-1">
                                        add_box
                                    </span>
                                    Read More
                                </button>
                            </div>
                            <div class="justify-content-center loading-upvotes-div my-5" style="display: none;">
                                <div class="spinner-border" role="status">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
