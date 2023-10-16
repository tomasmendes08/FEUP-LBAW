
<div class="comment rounded mb-4 col-12" style="border: solid 2px #212529;">
    <div class="comment-header d-flex flex-row">
        @if ($comment->owner != null)
            <div class="username mt-3 ms-3 d-flex align-items-center col-6" style="color: grey;">
                @if (file_exists(public_path('images/userProfile/' . $comment->owner->user_id . '.jpg')))
                    <img src="{{asset('images/userProfile/' . $comment->owner->user_id . '.jpg')}}" class="rounded-circle me-2" width="40">
                @else
                    <img src="{{asset('images/userProfile/null.jpg')}}" class="rounded-circle me-2" width="40">
                @endif
                <h5 class="fw-bold">{{$comment->owner->username}}</h5>
            </div>
        @else
            <div class="username mt-3 ms-3 d-flex align-items-center col-6" style="color: grey;">
                @if (file_exists(public_path('images/userProfile/null.jpg')))
                    <img src="{{asset('images/userProfile/null.jpg')}}" class="rounded-circle me-2" width="40">
                @else
                    <img src="{{asset('images/userProfile/null.jpg')}}" class="rounded-circle me-2" width="40">
                @endif
                <h5 class="fw-bold">Deleted User</h5>
            </div>
        @endif
        <!--<div class="comment-header-icons mt-3 col-5 d-flex justify-content-end align-items-center">
            <span class="material-icons edit-icon me-4 d-sm-block d-none" style="font-size: 25px;">
            mode_edit
            </span>
            <span class="material-icons delete-icon d-sm-block d-none" style="font-size: 25px;">
            delete
            </span>
        </div>-->
    </div>
    <div class="comment-text col-10 mt-3 ms-3">
        <h5>{{$comment->comment_body}}</h5>
        @auth
        @if ($comment->author === Auth::id())
        <div class="edit-comment-area" hidden>
            <textarea class="form-control" id="form-textarea-edit-comment{{$comment->comment_id}}" rows="4">{{$comment->comment_body}}</textarea>
            <div class="gap-2 d-flex justify-content-end mb-4">
                <button class="btn btn-dark mt-3 ajax-edit-comment{{$comment->comment_id}}" type="submit">Update</button>
                <button class="btn btn-outline-dark mt-3 edit-cancel-comment{{$comment->comment_id}}" type="button">Cancel</button>
            </div>
        </div>
        @endif
        @endauth
    </div>
    <div class="card-footer comment-footer d-flex">
        <span class="text-muted col-sm-11 col-9 fw-bold">{{$comment->comment_date}}</span>
        <div class="col-sm-1 col-3 offset-sm-0 offset-2">
            @auth
            @if ($comment->author === Auth::id())
            <div class="comment-options dropup">
                <span class="material-icons more-options me-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    more_horiz
                </span>

                <div class="comment-options-buttons dropdown-menu" data-id={{$comment->comment_id}} style="border: 2px solid;">
                    <button type="button" class="btn d-flex edit-comment-button" style="border: 0px;">
                        <span class="material-icons edit-icon me-2">
                            mode_edit
                        </span>
                        Edit
                    </button>
                    <button type="button" class="btn d-flex mt-3 delete-comment-button" style="border: 0px;">
                        <span class="material-icons delete-icon me-2">
                            delete
                        </span>
                        Delete
                    </button>
                </div>
            </div>
            @else
            @if (Auth::user()->isAdmin(Auth::id()))
            <div class="comment-options dropup">
                <span class="material-icons more-options me-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    more_horiz
                </span>
                <div class="comment-options-buttons dropdown-menu" data-id={{$comment->comment_id}} style="border: 2px solid;">
                    <button type="button" class="btn d-flex delete-comment-button" style="border: 0px;">
                        <span class="material-icons delete-icon me-2">
                            delete
                        </span>
                        Delete
                    </button>
                    <button type="button" class="btn d-flex mt-3 report-comment-button" style="border: 0px;">
                        <span class="material-icons report-icon me-2">
                            flag
                        </span>
                        Report
                    </button>
                </div>
            </div>
            @else
            <div class="comment-options-buttons" data-id={{$comment->comment_id}}>
                <span class="comment-report-icon material-icons">
                    flag
                </span>
            </div>
            @endif
            @endif
            @endauth
        </div>
    </div>
</div>
