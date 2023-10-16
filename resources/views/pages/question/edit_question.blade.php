@extends('layouts.app')

@section('content')

<section class="edit-question mt-5">
    <form id="edit-question-form" method="POST" enctype='multipart/form-data' action="{{route('edit_question', ['question_id' => $question->question_id])}}">
        @method("PUT")
        @csrf
        <div class="edit-question-cont container">
            <div class="edit-question-header">
                <h2 class="fw-bold">Edit Question</h2>
            </div>
            <div class="edit-question-title mt-4">
                <label for="question-title" class="form-label" style="color:#fd5d22;"><h5>Question Title*</h5></label>
                <input type="text" class="form-control mx-1" id="question-title" aria-describedby="question-title" name="question_title" value="{{$question->question_title}}" required>
                <div id="question-title-advice" class="form-text text-muted mt-2">Make the question title clear.</div>
            </div>
            <div class="edit-question-body mt-4">
                <label for="question-body-area" class="form-label" style="color:#fd5d22;"><h5>Question Body</h5></label>
                <textarea class="form-control mx-1" id="question-body-area" name="question_body" aria-describedby="question-body-area" rows="5">{{$question->question_body}}</textarea>
                <div id="question-body-advice" class="form-text text-muted mt-2">Describe the details about your question to be easier to help you.</div>
            </div>
            <div class="input-group mt-4 edit-question-space">
                <label for="question-space" class="form-label col-12" style="color:#fd5d22;"><h5>Space*</h5></label>
                <select id="question-space" class="form-select mx-1" name="question_space" required>
                    <option value="">No Space Selected</option>
                    <option value="science" {{$question->space->space_name === "science" ? ' selected="selected"' : '' }}>Science</option>
                    <option value="technology" {{$question->space->space_name === "technology" ? ' selected="selected"' : '' }}>Technology</option>
                    <option value="engineering" {{$question->space->space_name === "engineering" ? ' selected="selected"' : '' }}>Engineering</option>
                    <option value="maths" {{$question->space->space_name === "maths" ? ' selected="selected"' : '' }}>Maths</option>
                </select>
                <div id="question-space-advice" class="form-text text-muted mt-2 col-12">Choose the space that best suits your question.</div>
            </div>
            <div class="my-3">
                <label for="image" class="form-label" style="   color:#fd5d22;"><h5>Image</h5></label>
                <input class="form-control" type="file" id="image" name="image">
            </div>
            @if (file_exists(public_path('images/question/' . $question->question_id . '.jpg')))
                <div class="my-3 d-flex justify-content-between">
                    <label for="image" class="form-label" style="color:#fd5d22;"><h5>Remove Image</h5></label>
                    <input type="checkbox" id="removeImage" name="removeImage">
                </div>
            @endif
            <div class="submit-question my-5 d-flex justify-content-start">
                <button class="btn btn-submit-question rounded" type="submit">Edit Question</button>
            </div>
        </div>
    </form>
</section>

@endsection
