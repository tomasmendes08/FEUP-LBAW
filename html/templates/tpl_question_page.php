<?php

    function draw_question_page(){
?>
    <section class="question-and-answer-page mt-5" id="question-page-top">

        <div class="container question-card-container" style="">
    
            <div class="question col-12 mt-4">
                <div class="card card-question mb-5 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                    <div class="question-header ms-3 d-flex flex-sm-row flex-column">
                        <div class="username mt-2 d-flex align-items-center col-6" style="color: grey;">
                            <img src="../images/bradpitt.jpg" class="rounded-circle me-2" width="60">
                            <h4>bradpitt01</h4>
                        </div>
                        <div class="question-space mt-3 col-6 d-flex align-items-sm-end align-items-start flex-column" style="">
                            <button type="button" class="btn btn-outline-success rounded me-3">Science</button>
                            <div class="question-header-icons d-sm-block d-none me-3 mt-3">
                                <span class="material-icons edit-icon me-3" style="font-size: 25px;" onclick="location.href='../pages/edit_question.php'">
                                mode_edit
                                </span>
                                <span class="material-icons delete-icon" style="font-size: 25px;">
                                delete
                                </span> 
                            </div>
                        </div>
                        
                    </div>
                    <ul class="list-group list-group-flush mt-3">
                    </ul>
                    <div class="question-title">
                    
                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href=''">
                            <h2>Why isn't alchemy considered a science?</h2>
                        </div>
                        <br>
                        <div class="question-title-secondary-text text-muted me-2 ms-3">
                            <p>In the ancient past people noticed that it was possible to change one substance into another. Alchemy was the study of how this was done. Alchemists would experiment on various substances, trying to turn lead into gold or to create the elixir of life. Why isn't alchemy considered a science? It's a very complex field of study, with years of knowledge behind it.</p>
                        </div>
                        <div class="votes mt-2 d-flex justify-content-center">
                            <span class="left material-icons me-4" >
                                arrow_drop_down
                            </span>
                            77
                            <span class="right material-icons ms-4" >
                                arrow_drop_up
                            </span>
                        </div>
                    </div>
                    <div class="card-footer d-flex flex-row">
                        <div class="col-11 ms-md-3 ms-sm-1 ms-0 text-start text-muted" style="font-weight:bolder;">
                            12:00 - 11/03/2021
                        </div>
                        <div class="col-1">
                            <span class="report-icon material-icons d-sm-block d-none me-1">
                                flag
                            </span>
                            <span class="material-icons d-sm-none ">
                                more_horiz
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="division-question-answers container mt-5" style="">
            <hr class="rounded" style="border-radius: 3px; border: solid 3px;">
            <div class="row d-flex mt-5">
                <div class="nr_answers col-5 offset-1" style="">
                        <h5>5 Answers</h5>
                </div>
                <div class="add-answer col-5 d-flex justify-content-end">
                    <a class="btn btn-add-answer" href="#submit-your-answer">Add Answer</a>
                </div>
            </div>
        </div>

        <div class="answers-space container mt-5">
            <div class="answer">
                <div class="card card-answer mb-4 " style="border: solid 1px #212529; box-shadow: 0em 0em 0em 0.2em #fd5d22;">
                    <div class="answer-header ms-3 d-flex flex-sm-row flex-column" >
                        <div class="username mt-2 d-flex align-items-center col-6" style="color: grey;">
                            <img src="../images/tomcruise.jpg" class="rounded-circle me-2" width="60">
                            <h4>tomcruise17</h4>
                        </div>
                        <div class="answer-space-best-answer mt-2 col-sm-5 col-7 d-flex flex-row align-items-sm-center justify-content-sm-end align-items-start" style="font-weight:bolder; font-size:20px;">
                            Best Answer 
                            <span class="material-icons ms-1 " style="font-size: 30px; color: #fd5d22;">
                            star
                            </span>
                        </div>
                
                    </div>
                    <ul class="list-group list-group-flush mt-2">
                    </ul>
                    <div class="answer-title">
                        <div class="row container d-flex">
                            <div class="answer-title-secondary-text mt-3 col-10">
                                <p>Alchemy is best described as a form of proto-science rather than a distinct science in its own right. This is because, although many observations and theories made by alchemists were based on scientific fact, they often explained these in terms of magic or divine intervention.</p>
                            </div>
                            <span class="material-icons col-2 d-flex flex-column align-items-center justify-content-center" style="font-size: 50px; color: #fd5d22;">
                            check
                            </span>
                        </div>
                        <div class="row">
                            <div class="votes col-sm-7 col-6 mt-1 d-flex justify-content-center">
                                <span class="left material-icons me-sm-4 ms-1" >
                                    arrow_drop_down
                                </span>
                                200
                                <span class="right material-icons ms-sm-4 ms-1" >
                                    arrow_drop_up
                                </span>
                            </div>
                            <div class="add-comment col-sm-5 col-4 d-flex justify-content-center align-items-center">
                                <a class="btn btn-dark me-1 mb-1" data-bs-toggle="collapse" href="#collapseCommentForm1" role="button" aria-expanded="false" aria-controls="collapseCommentForm">Add Comment</a>                            </div>
                            <div class="d-flex align-items-center justify-content-center d-sm-none col-2">
                                <span class="report-icon material-icons ">
                                    flag
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                            <button class="btn btn-outline-dark" data-bs-toggle="collapse" href="#collapseAnswerComments1" role="button" aria-expanded="false" aria-controls="collapseAnswerComments">2 comments</button>
                        </div>
                        <div class="col-6 col-sm-6 ms-md-4 ms-sm-2 ms-0 text-end text-sm-start text-muted" style="font-weight:bolder;">
                            12:00 - 11/03/2021
                        </div>
                        <div class="col-1 ms-0 d-none d-sm-block">
                            <span class="report-icon material-icons me-1">
                                flag
                            </span>
                        </div>
                    </div>
                </div>
                <div class="comments col-8 offset-4 mt-5">
                    <div class="collapse" id="collapseCommentForm1">
                        <form id="submit-comment" action="" method="">
                            <div class="mb-3 p-3">
                                <textarea class="form-control" rows="4" placeholder="Type your comment here"></textarea>
                                <div class=" gap-2 d-flex justify-content-end">
                                    <button class="btn btn-dark mt-3" type="submit">Submit</button>
                                    <button class="btn btn-outline-dark mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCommentForm" aria-expanded="false" aria-controls="collapseCommentForm">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="collapse" id="collapseAnswerComments1">

                        <div class="comment rounded col-12" style="border: solid 1px #212529;">
                            <div class="comment-header d-flex flex-row">
                                <div class="username mt-3 ms-3 d-flex align-items-center col-6" style="color: grey;">
                                    <img src="../images/bradpitt.jpg" class="rounded-circle me-2" width="40">
                                    <h5>bradpitt17</h5>
                                </div>
                                <div class="comment-header-icons mt-3 col-5 d-flex justify-content-end align-items-center">
                                    <span class="material-icons edit-icon me-4 d-sm-block d-none" style="font-size: 25px;">
                                    mode_edit
                                    </span>
                                    <span class="material-icons delete-icon d-sm-block d-none" style="font-size: 25px;">
                                    delete
                                    </span> 
                                </div>
                            </div>
                            <div class="comment-text col-10 mt-3 ms-3">
                                <p>Thanks bro, you are really good!</p>
                            </div>
                            <div class="card-footer d-flex">
                                <span class="text-muted col-sm-11 col-9">12:15 - 11/03/2021</span>
                                <div class="col-sm-1 col-3 offset-sm-0 offset-2">
                                    <span class="report-icon material-icons d-sm-block d-none">
                                        flag
                                    </span>
                                    <span class="material-icons d-sm-none ">
                                        more_horiz
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="comment rounded mt-4 col-12" style="border: solid 1px #212529;">
                            <div class="comment-header d-flex flex-row">
                                <div class="username mt-3 ms-3 d-flex align-items-center col-6" style="color: grey;">
                                    <img src="../images/caio.png" class="rounded-circle me-2" width="40">
                                    <h5>caiog37</h5>
                                </div>
                                
                            </div>
                            <div class="comment-text col-10 mt-3 ms-3">
                                <p>Wrong!</p>
                            </div>
                            <div class="card-footer d-flex">
                                <span class="text-muted col-sm-11 col-9">12:16 - 11/03/2021</span>
                                <div class="col-sm-1 col-3 offset-sm-0 offset-2">
                                    <span class="report-icon material-icons d-sm-block d-none">
                                        flag
                                    </span>
                                    <span class="material-icons d-sm-none ">
                                        more_horiz
                                    </span>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
            <hr class="mt-5">
            <div class="answer mt-5">
                <div class="card mb-4 " style="border: solid 2px #212529;">
                    <div class="answer-header ms-3 d-flex flex-sm-row flex-column" >
                        <div class="username mt-2 d-flex align-items-center col-6" style="color: grey;">
                            <img src="../images/caio.png" class="rounded-circle me-2" width="60">
                            <h4>caiog37</h4>
                        </div>
                        
                    </div>
                    <ul class="list-group list-group-flush mt-2">
                    </ul>
                    <div class="answer-title">
                        <div class="row container d-flex">
                            <div class="answer-title-secondary-text mt-3 col-11">
                                <p>Because alchemy is bad! It's really bad. Useless..</p>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="votes col-sm-7 col-6 mt-1 d-flex justify-content-center">
                                <span class="left material-icons me-sm-4 ms-1" >
                                    arrow_drop_down
                                </span>
                                -8
                                <span class="right material-icons ms-sm-4 ms-1" >
                                    arrow_drop_up
                                </span>
                            </div>
                            <div class="add-comment col-sm-5 col-4 d-flex justify-content-center align-items-center">
                                <a class="btn btn-dark me-1 mb-1" data-bs-toggle="collapse" href="#collapseCommentForm2" role="button" aria-expanded="false" aria-controls="collapseCommentForm">Add Comment</a>
                            </div>
                            <div class="d-flex align-items-center justify-content-center d-sm-none col-2">
                                <span class="report-icon material-icons ">
                                    flag
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                            <button class="btn btn-outline-dark" data-bs-toggle="collapse" href="#collapseAnswerComments2" role="button" aria-expanded="false" aria-controls="collapseAnswerComments">1 comment</button>
                        </div>
                        <div class="col-6 col-sm-6 ms-md-4 ms-sm-2 ms-0 text-end text-sm-start text-muted" style="font-weight:bolder;">
                            12:16 - 11/03/2021
                        </div>
                        <div class="col-1 ms-0 d-none d-sm-block">
                            <span class="report-icon material-icons me-1">
                                flag
                            </span>
                        </div>
                    </div>
                </div>
               
                <div class="comments w-75 col-7 offset-3 mt-5">
                    <div class="collapse" id="collapseCommentForm2">
                        <form id="submit-comment" action="" method="">
                            <div class="mb-3 p-3">
                                <textarea class="form-control" rows="4" placeholder="Type your comment here"></textarea>
                                <div class=" gap-2 d-flex justify-content-end">
                                    <button class="btn btn-dark mt-3" type="submit">Submit</button>
                                    <button class="btn btn-outline-dark mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCommentForm" aria-expanded="false" aria-controls="collapseCommentForm">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="collapse" id="collapseAnswerComments2">
                        <div class="comment rounded col-12" style="border: solid 1px #212529;">
                            <div class="comment-header d-flex flex-row">
                                <div class="username mt-3 ms-3 d-flex align-items-center col-6" style="color: grey;">
                                    <img src="../images/bradpitt.jpg" class="rounded-circle me-2" width="40">
                                    <h5>bradpitt17</h5>
                                </div>
                                <div class="comment-header-icons mt-3 col-5 d-flex justify-content-end align-items-center">
                                    <span class="material-icons edit-icon me-4 d-sm-block d-none" style="font-size: 25px;">
                                    mode_edit
                                    </span>
                                    <span class="material-icons delete-icon d-sm-block d-none" style="font-size: 25px;">
                                    delete
                                    </span> 
                                </div>
                            </div>
                            <div class="comment-text col-10 mt-3 ms-3">
                                <p>Reported...</p>
                            </div>
                            <div class="card-footer d-flex">
                                <span class="text-muted col-sm-11 col-9">12:15 - 11/03/2021</span>
                                <div class="col-sm-1 col-3 offset-sm-0 offset-2">
                                    <span class="report-icon material-icons d-sm-block d-none">
                                        flag
                                    </span>
                                    <span class="material-icons d-sm-none ">
                                        more_horiz
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="mt-5">
            <form id="submit-your-answer" class="give-your-answer mt-5 mb-5">
                <div class="give-your-answer-header col-11 ms-3">
                    <label for="question-text-area" class="form-label"><h4 style="font-weight: bolder;">Give your answer</h4></label>
                    <textarea class="form-control mt-4" id="exampleFormControlTextarea1" rows="15" placeholder="Write your answer here!"></textarea>
                </div>
                <button class="btn btn-submit-answer rounded mt-4 ms-3" type="submit" href="#">Submit Answer</button>
                <div class="question-page-back-top col-6 offset-6 d-flex justify-content-end">
                    <a class="btn btn-dark my-5" href=#question-page-top>Back to question</a>
                </div>
            </form>
        </div>
    </section>
<?php
    }
?>