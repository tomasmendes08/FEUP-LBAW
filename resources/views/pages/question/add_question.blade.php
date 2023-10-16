@extends('layouts.app')

@section('title', 'Add Question')

@section('content')

<section class="add-question mt-5">
    <form id="add-question-form" method="POST" enctype='multipart/form-data' action="{{route('add_question')}}">
        @csrf
        <div class="add-question-cont container">
            <div class="add-question-header">
                <h2 style="font-weight: bolder;">Add Question</h2>
            </div>
            <div class="add-question-title mt-4">
                <label for="question-title" class="form-label" style="color:#fd5d22;"><h5>Question Title*</h5></label>
                <input type="text" class="form-control mx-1" id="question-title" aria-describedby="question-title" name="question_title" required>
                <div id="question-title-advice" class="form-text text-muted mt-2">Make the question title clear.</div>
            </div>
            <div class="add-question-body mt-4">
                <label for="question-body-area" class="form-label" style="color:#fd5d22;"><h5>Question Body</h5></label>
                <textarea class="form-control mx-1" id="question-body-area" name="question_body" aria-describedby="question-body-area" rows="5"></textarea>
                <div id="question-body-advice" class="form-text text-muted mt-2">Describe the details about your question to be easier to help you.</div>
            </div>
            <div class="input-group mt-4 add-question-space">
                <label for="question-space" class="form-label col-12" style="color:#fd5d22;"><h5>Space*</h5></label>
                <select id="question-space" class="form-select mx-1" name="question_space" required>
                    <option value="" default>No Space Selected</option>
                    <option value="science">Science</option>
                    <option value="technology">Technology</option>
                    <option value="engineering">Engineering</option>
                    <option value="maths">Maths</option>
                </select>
                <div id="question-space-advice" class="form-text text-muted mt-2 col-12">Choose the space that best suits your question.</div>
            </div>
            <div class="my-3">
                <label for="image" class="form-label" style="color:#fd5d22;"><h5>Image</h5></label>
                <input class="form-control" type="file" id="image" name="image">
            </div>
            <div class="submit-question my-5 d-flex justify-content-start">
                <button class="btn btn-submit-question rounded" type="submit">Submit Question</button>
            </div>
        </div>
    </form>
</section>

@endsection
