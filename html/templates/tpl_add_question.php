<?php
    function draw_add_question(){
?>

    <section class="add-question mt-5">
        <div class="add-question-cont container">
            <div class="add-question-header">
                <h2 style="font-weight: bolder;">Add Question</h2>
            </div>
            <div class="add-question-title mt-4">
                <label for="question-title" class="form-label" style="color:#fd5d22;"><h5>Question Title*</h5></label>
                <input type="text" class="form-control mx-1" id="question-title" aria-describedby="question-title">
                <div id="question-title-advice" class="form-text text-muted mt-2">Make the question title clear.</div>
            </div>
            <div class="add-question-body mt-4">
                <label for="question-body-area" class="form-label" style="color:#fd5d22;"><h5>Question Body*</h5></label>
                <textarea class="form-control mx-1" id="question-body-area" aria-describedby="question-body-area" rows="10"></textarea>
                <div id="question-body-advice" class="form-text text-muted mt-2">Describe the details about your question to be easier to help you.</div>
            </div>
            <div class="input-group mt-4 add-question-space">
                <label for="question-space" class="form-label col-12" style="color:#fd5d22;"><h5>Space*</h5></label>
                <select id="question-space" class="form-select mx-1">
                        <option>No Space Selected</option>
                        <option value=science>Science</option>
                        <option value=technology>Technology</option>
                        <option value=engineering>Engineering</option>
                        <option value=maths>Maths</option>
                </select>
                <div id="question-space-advice" class="form-text text-muted mt-2 col-12">Choose the space that best suits your question.</div>
            </div>
            <div class="submit-question my-5">
                <button class="btn btn-submit-question rounded" onclick="location.href='../pages/question_page.php'" type="submit">Submit Question</button>
            </div>
        </div>
    </section>

<?php
    }
?>