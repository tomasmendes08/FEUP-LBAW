@extends('layouts.app')

@section('title', 'Search')

@section('content')
<div class="search-users-page container my-5">
    <div class="row" id="search-users-top" style="">
        <form method="GET" action="/search_users" class="filters col-lg-3 mt-5 mx-auto bg-dark" style="border-radius: 10px; height: 390px;">
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
                <div class="by-order mt-4">
                    <label for="filter-by-order" class="form-label" style="color:#fd5d22;"><h5>Order By</h5></label>
                    @if (array_key_exists("order", $all_filters))
                    <select id="filter-by-order" class="form-select " name="order">
                        <option value="">No Option Selected</option>
                        <option value="high_reputation" {{$all_filters['order'] === "high_reputation" ? ' selected="selected"' : '' }}>Higher Reputation</option>
                        <option value="low_reputation" {{$all_filters['order'] === "low_reputation" ? ' selected="selected"' : '' }}>Lower Reputation</option>
                    </select>
                    @else
                    <select id="filter-by-order" class="form-select " name="order">
                        <option value="">No Option Selected</option>
                        <option value="high_reputation">Higher Reputation</option>
                        <option value="low_reputation">Lower Reputation</option>
                    </select>
                    @endif
                </div>  
                
                <div class="submit-search-users-button mt-5 d-flex justify-content-center">
                    <button type="submit" class="btn btn-submit-search-users w-50" style="color:white; background-color: #fd5d22; border: 2px solid #fd5d22;">Search</button>
                </div>
            </div>    
        </form>
        <div class="search-users-results col-lg-8 offset-xl-1 mt-5">
            
            <div class="search-users-result-header d-flex justify-content-center align-items-center flex-column my-4">
                <h3 class="fw-bold mb-3">Results for Users: @if (array_key_exists("text_search", $all_filters)) "{{$all_filters['text_search']}}"</h3>@else""</h3>@endif
                <h6><a class="mb-3" style="color:black;" href="/search">Search for Posts instead</a></h6>
            </div>
            
            <div class="show-search-users-results">
                <ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
                    <li class="col-12 d-flex justify-content-center nav-item" role="presentation">
                        <button class="button-tab-filter nav-link active" id="pills-search-users-tab" data-bs-toggle="pill" data-bs-target="#pills-search-users" type="button" role="tab" aria-controls="pills-search-users" aria-selected="true" style="background-color: #212529;">Users</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-search-users" role="tabpanel" aria-labelledby="pills-search-users-tab">
                        @if (count($users) === 0)
                            <div class="no-results-users d-flex justify-content-center">
                                <h4>No results found for Users</h4>
                            </div>
                        @else
                        @foreach ($users as $user)
                            <div class="mt-5">
                                @include('partials.cards.user_profile_card', ['user' => $user])
                            </div>
                        @endforeach
                            <div class="page-users my-5 d-flex justify-content-center">
                                {!! $users->withQueryString()->links() !!}
                            </div>
                        @endif
                    </div>
                    
                </div>
            </div>
           
        </div>
    </div>        
</div>
@endsection