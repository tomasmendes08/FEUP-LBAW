@extends('layouts.app')

@section('title', 'Search')

@section('content')

<div class="search-page container my-5">
        
    <div class="row" id="search-top" style="">
        <form method="GET" action="/search" class="filters col-lg-3 mt-5 mx-auto bg-dark" style="border-radius: 10px; height: 490px;">
            <div class="filters-title d-flex justify-content-start align-items-center mt-4 mx-3" style="color:white;">
                <span class="material-icons filter-icon me-2 mb-1 fw-bold">
                    filter_list
                </span>
                <h3 class="fw-bold">Filters</h3>
            </div>
            <div class="all-filters mx-3 mt-4">
                <div class="by-text">
                    <label for="filter-by-text-search" class="form-label" style="color:#fd5d22;"><h5>Text Search</h5></label>
                    @if (array_key_exists("text_search", $all_filters))
                    <input type="text" class="form-control" name="text_search" id="filter-by-text-search" aria-describedby="filter-by-text-search" placeholder="Search" value="{{$all_filters['text_search']}}">
                    @else
                    <input type="text" class="form-control" name="text_search" id="filter-by-text-search" aria-describedby="filter-by-text-search" placeholder="Search">
                    @endif
                </div>
                <div class="by-space mt-4">
                    <label for="filter-by-space" class="form-label" style="color:#fd5d22;"><h5>Space</h5></label>
                    @if (array_key_exists("space", $all_filters))
                    <select id="filter-by-space" class="form-select " name="space">
                        <option value="">No Option Selected</option>
                        <option value="science" {{$all_filters['space'] === "science" ? ' selected="selected"' : '' }}>Science</option>
                        <option value="technology" {{$all_filters['space'] === "technology" ? ' selected="selected"' : '' }}>Technology</option>
                        <option value="engineering" {{$all_filters['space'] === "engineering" ? ' selected="selected"' : '' }}>Engineering</option>
                        <option value="maths" {{$all_filters['space'] === "maths" ? ' selected="selected"' : '' }}>Maths</option>
                    </select>
                    @else
                    <select id="filter-by-space" class="form-select " name="space">
                        <option value="">No Option Selected</option>
                        <option value="science" >Science</option>
                        <option value="technology" >Technology</option>
                        <option value="engineering" >Engineering</option>
                        <option value="maths" >Maths</option>
                    </select>
                    @endif
                </div>
                <div class="by-order mt-4">
                    <label for="filter-by-order" class="form-label" style="color:#fd5d22;"><h5>Order By</h5></label>
                    @if (array_key_exists("order", $all_filters))
                    <select id="filter-by-order" class="form-select " name="order">
                        <option value="">No Option Selected</option>
                        <option value="upvotes" {{$all_filters['order'] === "upvotes" ? ' selected="selected"' : '' }}>Most Upvotes</option>
                        <option value="downvotes" {{$all_filters['order'] === "downvotes" ? ' selected="selected"' : '' }}>Most Downvotes</option>
                        <option value="newest" {{$all_filters['order'] === "newest" ? ' selected="selected"' : '' }}>Newest</option>
                        <option value="oldest" {{$all_filters['order'] === "oldest" ? ' selected="selected"' : '' }}>Oldest</option>
                    </select>
                    @else
                    <select id="filter-by-order" class="form-select " name="order">
                        <option value="">No Option Selected</option>
                        <option value="upvotes">Most Upvotes</option>
                        <option value="downvotes" >Most Downvotes</option>
                        <option value="newest" >Newest</option>
                        <option value="oldest" >Oldest</option>
                    </select>
                    @endif
                </div>  
                
                <div class="submit-search-button mt-5 d-flex justify-content-center">
                    <button type="submit" class="btn btn-submit-search w-50" style="color:white; background-color: #fd5d22; border: 2px solid #fd5d22;">Search</button>
                </div>
            </div>
        </form>
        <div class="search-results col-lg-8 offset-xl-1 mt-5">
            
            <div class="search-result-header d-flex justify-content-center align-items-center flex-column my-4">
                <h3 class="fw-bold mb-3">Results for Posts: @if (array_key_exists("text_search", $all_filters)) "{{$all_filters['text_search']}}"</h3>@else""</h3>@endif
                <h6><a class="mb-3" style="color:black;" href="/search_users">Search for Users instead</a></h6>
            </div>
            
            <div class="show-search-results">
                <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
                    <li class="col-4 d-flex justify-content-center nav-item" role="presentation">
                        <button class="button-tab-filter nav-link active" id="pills-search-questions-tab" data-bs-toggle="pill" data-bs-target="#pills-search-questions" type="button" role="tab" aria-controls="pills-search-questions" aria-selected="true">Questions</button>
                    </li>
                    <li class="col-4 d-flex justify-content-center nav-item" role="presentation">
                        <button class="button-tab-filter nav-link" id="pills-search-answers-tab" data-bs-toggle="pill" data-bs-target="#pills-search-answers" type="button" role="tab" aria-controls="pills-search-answers" aria-selected="false">Answers</button>
                    </li>
                    <li class="col-4 d-flex justify-content-center nav-item" role="presentation">
                        <button class="button-tab-filter nav-link" id="pills-search-comments-tab" data-bs-toggle="pill" data-bs-target="#pills-search-comments" type="button" role="tab" aria-controls="pills-search-comments" aria-selected="false">Comments</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-search-questions" role="tabpanel" aria-labelledby="pills-search-questions-tab">
                        @if (count($questions) === 0)
                            <div class="no-results-questions d-flex justify-content-center">
                                <h4>No results found for Questions</h4>
                            </div>
                        @else
                        @foreach ($questions as $question)
                            <div class="mt-5">
                                @include('partials.cards.question_card', ['question' => $question])
                            </div>
                        @endforeach
                            <div class="page-questions my-5 d-flex justify-content-center">
                                {!! $questions->withQueryString()->links() !!}
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane fade show" id="pills-search-answers" role="tabpanel" aria-labelledby="pills-search-answers-tab">
                        @if (count($answers) === 0)
                            <div class="no-results-answers d-flex justify-content-center">
                                <h4>No results found for Answers</h4>
                            </div>
                        @else
                        @foreach ($answers as $answer)
                            <div class="mt-5">
                                @include('partials.cards.answer_card_profile', ['answer' => $answer])
                            </div>
                        @endforeach
                            <div class="page-answers my-5 d-flex justify-content-center">
                                {!! $answers->withQueryString()->links() !!}
                            </div>
                        @endif
                    </div>
                    <div class="tab-pane fade show" id="pills-search-comments" role="tabpanel" aria-labelledby="pills-search-comments-tab">
                        @if (count($comments) === 0)
                            <div class="no-results-comments d-flex justify-content-center">
                                <h4>No results found for Comments</h4>
                            </div>
                        @else
                        @foreach ($comments as $comment)
                            <div class="mt-5">
                                @include('partials.cards.comment_card', ['comment' => $comment])
                            </div>
                        @endforeach
                            <div class="page-comments my-5 d-flex justify-content-center">
                                {!! $comments->withQueryString()->links() !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>
    
@endsection