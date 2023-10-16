<?php
    function draw_user_admin_award_card() { ?>
        <div class="card border-dark mb-3">
            <div class="user_header_2 d-flex m-2 row" style="">
                <div class="user_header_2_aux d-flex col-6 my-auto">
                    <div class="">
                        <img src="../images/scarlett.jpg" class="flex-shrink-0 rounded-circle" alt="..." style="width:60px; height:60px;">
                    </div>
                    <div class="mt-3 mb-3 px-3">
                        <h6>scarlett21</h6>
                    </div>
                </div>

                <div class="container px-0 col-6 d-flex flex-column align-contents-stretch" id="buttonsAwardUser">
                    <a href="../pages/admin_top_posts.php" class="btn btn-dark m-1">Top Posts</a>
                    <button type="button" class="btn btn-success m-1">Give Admin</button>
                </div>
            </div>
            <div class="container mx-auto justify-content-between align-content-stretch" style="display:none;" id="smallButtonsAwardUser">
                <a href="../pages/admin_top_posts.php" class="btn btn-dark m-1 align-self-end">Top Posts</a>
                <button type="button" class="btn btn-success m-1">Give Admin</button>
            </div>
        </div>

<?php    }

    function draw_user_admin_report_card() { ?>
        <div class="card border-dark mb-3">
            <div class="user_header_2 d-flex m-2" style="">
                <div class="user_header_2_aux col-6 d-flex my-auto">
                    <div class="">
                        <img src="../images/scarlett.jpg" class="flex-shrink-0 rounded-circle" alt="..." style="width:60px; height:60px;">
                    </div>
                    <div class="mt-3 mb-3 px-3">
                        <h6>scarlett21</h6>
                    </div>
                </div>

                <div class="d-flex col-6 flex-column px-0 align-content-stretch" id="buttonsReportUser">
                    <a href="../pages/admin_reported_posts.php" class="btn btn-dark m-1 " >Reported Posts</a>
                    <button type="button" class="btn btn-ban-user m-1">Ban User</button>
                </div>
            </div>
            <div class="container justify-content-between" style="display:none;" id="smallButtonsReportUser">
                <a href="../pages/admin_reported_posts.php" class="btn btn-dark m-1" >Reported Posts</a>
                <button type="button" class="btn btn-ban-user m-1">Ban User</button>
            </div>
        </div>

<?php    }



    function draw_profile_regular_user(){
?>

    


<?php
    }
    function draw_edit_profile() {

    }
?>


<?php

    function draw_profile_regular_user2() {
?>
    <section class="user-profile bg-light">
        <div class="user-profile-cont container-md px-md-0 px-3 mt-5 mb-5 d-flex justify-content-center">
                <div class="user-profile col-12">
                    <div class="user-profile-header"> 
                        
                    </div>
                    <div class="user-profile-content d-md-flex cont px-4">
                        <div class="user-profile-content-left mb-4 col-md-4 col-12 d-flex flex-column align-items-center"> 
                            <img src="../images/bradpitt.jpg" class="rounded-circle img-thumbnail" />
                            <div class="profile-names text-center mt-2">
                                <h4 class="name" style="font-weight:bolder;">Brad Pitt
                                </h4>
                                <h5 class="username" style="color: #ff8a60;">@bradpitt01</h5>
                                <div class="reputation mt-3 mb-2 d-flex justify-content-center">
                                    <span class="material-icons" style="font-size: 30px;">
                                    military_tech
                                    </span>
                                    <h5 style="">
                                        297 Rep.
                                    </h5>
                                </div>
                            </div>
                            <div class="edit-profile-button mt-4">
                                <button type="button" class="btn btn-edit-profile d-flex justify-content-center" onclick="location.href='../pages/edit_profile.php'" style="">
                                    Edit Profile
                                </button>
                            </div>
                            <div class="profile-description mt-5">
                                <div class="profile-description-header d-flex justify-content-center"><h5 style="font-weight:bolder;">About Me</h5></div>
                                <p class="information mt-3 text-justify col-10 offset-1" >
                                Hi guys! I'm a tech enthusiast, so I really like to help anyone that needs advice inside the techonology space. I'm also a cinema addicted and my favourite film is "The Wizard of Oz". Besides that, music plays a key role on my daily life!
                                <br>insta:tylerdurden01
                                </p>
                            </div>
                            <div class="profile-spaces mt-3 mb-5">
                                <div class="profile-spaces-header d-flex justify-content-center">
                                    <h5 style="font-weight: bolder;">Spaces</h5>
                                </div>
                                <div class="profile-spaces-selected mt-3 d-flex flex-column align-items-center">
                                    <button type="button" class="btn btn-outline-success rounded ">Science</button>
                                    <button type="button" class="btn btn-outline-primary rounded mt-3 ">Technology</button>
                                    <div class="other-spaces mt-4">
                                        <button type="button" class="btn btn-manage-spaces" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Manage Spaces
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Spaces</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1" checked>
                                                            <label class="form-check-label" for="flexCheckChecked1">
                                                                Science
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked2" checked>
                                                            <label class="form-check-label" for="flexCheckChecked2">
                                                                Technology
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexNotChecked1">
                                                            <label class="form-check-label" for="flexNotChecked1">
                                                                Engineering
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexNotChecked2">
                                                            <label class="form-check-label" for="flexNotChecked2">
                                                                Maths
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="modal-div-buttons d-flex justify-content-end me-4 my-3">
                                                        <button type="button" class="btn btn-outline-dark close-new-spaces-button me-3" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-dark save-new-spaces-button ">Save New Spaces</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mb-5">
                        <div class="user-profile-content-right col-md-8 ms-md-4 col-12 mt-md-4 mb-5">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="col-4 d-flex justify-content-center nav-item" role="presentation">
                                    <button class="button-tab-filter nav-link active" id="pills-questions-tab" data-bs-toggle="pill" data-bs-target="#pills-questions" type="button" role="tab" aria-controls="pills-questions" aria-selected="true">Questions</button>
                                </li>
                                <li class="col-4 d-flex justify-content-center nav-item" role="presentation">
                                    <button class="button-tab-filter nav-link" id="pills-answers-tab" data-bs-toggle="pill" data-bs-target="#pills-answers" type="button" role="tab" aria-controls="pills-answers" aria-selected="false">Answers</button>
                                </li>
                                <li class="col-4 d-flex justify-content-center nav-item" role="presentation">
                                    <button class="button-tab-filter nav-link" id="pills-comments-tab" data-bs-toggle="pill" data-bs-target="#pills-comments" type="button" role="tab" aria-controls="pills-comments" aria-selected="false">Comments</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-questions" role="tabpanel" aria-labelledby="pills-questions-tab">
                                    <div class="question-card-container" style="">
        
                                        <div class="question mt-5">
                                            <div class="card card-question " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                                <div class="question-header ms-3 d-flex flex-md-row flex-column">
                                                    <div class="username mt-2 d-flex align-items-center col-6" style="color: grey;">
                                                        <img src="../images/bradpitt.jpg" class="rounded-circle me-2" width="55">
                                                        <h5>bradpitt01</h5>
                                                    </div>
                                                    <div class="question-space mt-3 col-6 d-flex align-items-md-end align-items-start flex-column" style="">
                                                        <button type="button" class="btn btn-outline-success rounded me-3">Science</button>
                                                        <div class="question-header-icons me-3 mt-3 d-md-flex d-none">
                                                            <span class="material-icons edit-icon me-3" style="font-size: 20px;">
                                                            mode_edit
                                                            </span>
                                                            <span class="material-icons delete-icon" style="font-size: 20px;">
                                                            delete
                                                            </span> 
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <ul class="list-group list-group-flush mt-2">
                                                </ul>
                                                <div class="question-title">
                                                
                                                    <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                                        <h4>Why isn't alchemy considered a science?</h4>
                                                    </div>
                                                    <br>
                                                    <div class="votes d-flex justify-content-center" style="font-size:30px;">
                                                        <span class="left material-icons me-4" style="font-size:45px;">
                                                            arrow_drop_down
                                                        </span>
                                                        77
                                                        <span class="right material-icons ms-4" style="font-size:45px;">
                                                            arrow_drop_up
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="card-footer d-flex align-items-center">
                                                    <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                                                        <button type="button" class="nr_answers btn btn-outline-dark rounded">
                                                            3 answers
                                                        </button>
                                                    </div>
                                                    <div class="col-6 col-sm-6 ms-0 text-end text-sm-start text-muted" style="font-weight:bolder;">
                                                        12:00 - 11/03/2021
                                                    </div>
                                                    <div class="col-1 ms-0 d-none d-sm-block">
                                                        <span class="report-icon material-icons me-1">
                                                            flag
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="question-card-container" style="">
        
                                        <div class="question mt-5">
                                            <div class="card card-question " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                                <div class="question-header ms-3 d-flex flex-md-row flex-column">
                                                    <div class="username mt-2 d-flex align-items-center col-6" style="color: grey;">
                                                        <img src="../images/bradpitt.jpg" class="rounded-circle me-2" width="55">
                                                        <h4 style="font-size: 22px;">bradpitt01</h4>
                                                    </div>
                                                    <div class="question-space mt-3 col-6 d-flex align-items-md-end align-items-start flex-column" style="">
                                                        <button type="button" class="btn btn-outline-success rounded me-3">Science</button>
                                                        <div class="question-header-icons me-3 mt-3 d-md-flex d-none">
                                                            <span class="material-icons edit-icon me-3" style="font-size: 20px;">
                                                            mode_edit
                                                            </span>
                                                            <span class="material-icons delete-icon" style="font-size: 20px;">
                                                            delete
                                                            </span> 
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <ul class="list-group list-group-flush mt-2">
                                                </ul>
                                                <div class="question-title">
                                                
                                                    <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                                        <h4>Why isn't alchemy considered a science?</h4>
                                                    </div>
                                                    <br>
                                                    <div class="votes d-flex justify-content-center" style="font-size:30px;">
                                                        <span class="left material-icons me-4" style="font-size:45px;">
                                                            arrow_drop_down
                                                        </span>
                                                        77
                                                        <span class="right material-icons ms-4" style="font-size:45px;">
                                                            arrow_drop_up
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="card-footer d-flex align-items-center">
                                                    <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                                                        <button type="button" class="nr_answers btn btn-outline-dark rounded">
                                                            3 answers
                                                        </button>
                                                    </div>
                                                    <div class="col-6 col-sm-6 ms-0 text-end text-sm-start text-muted" style="font-weight:bolder;">
                                                        12:00 - 11/03/2021
                                                    </div>
                                                    <div class="col-1 ms-0 d-none d-sm-block">
                                                        <span class="report-icon material-icons me-1">
                                                            flag
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container d-flex justify-content-center flex-direction-column my-5" style="">
                                        <button type="button" class="btn read-more rounded d-flex justify-content-center">
                                            <span class="material-icons me-1">
                                                add_box
                                            </span>
                                            Read More
                                        </button>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="pills-answers" role="tabpanel" aria-labelledby="pills-answers-tab">
                                    <div class="answer mt-5" onclick="location.href='../pages/question_page.php'">
                                        <div class="card mb-4 " style="border: solid 2px #212529;">
                                            <div class="answer-header mx-3" >
                                                <div class="username mt-2 align-items-md-center d-flex justify-content-between flex-md-row flex-column" style="color: grey;">
                                                    <div class="d-flex align-items-center">
                                                        <img src="../images/bradpitt.jpg" class="rounded-circle me-2" width="60">
                                                        <h5>bradpitt01</h5>
                                                    </div>
                                                    <div class="d-flex mt-sm-0 mt-3">
                                                        <div class="comment-header-icons d-flex justify-content-end align-items-center me-sm-4 me-0 text-dark">
                                                            <span class="material-icons edit-icon me-lg-4 me-2 d-sm-block d-none" style="font-size: 25px;">
                                                                mode_edit
                                                            </span>
                                                            <span class="material-icons delete-icon d-sm-block d-none" style="font-size: 25px;">
                                                                delete
                                                            </span> 
                                                        </div> 
                                                        <button class="btn btn-dark">Check the question</button>
                                                    </div>
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
                                                    <div class="votes mt-1 d-flex justify-content-center align-items-center">
                                                        <span class="left material-icons me-sm-4 me-xs-3 me-2 fs-1" >
                                                            arrow_drop_down
                                                        </span>
                                                        <span class="fs-2">
                                                            12
                                                        </span>
                                                        <span class="right material-icons ms-sm-4 ms-xs-3 ms-2 fs-1" >
                                                            arrow_drop_up
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
                                    </div>
                                    <div class="container d-flex justify-content-center flex-direction-column my-5" style="">
                                        <button type="button" class="btn read-more rounded d-flex justify-content-center">
                                            <span class="material-icons me-1">
                                                add_box
                                            </span>
                                            Read More
                                        </button>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="pills-comments" role="tabpanel" aria-labelledby="pills-comments-tab">
                                    <div class="comment rounded col-12 mt-5" style="border: solid 1px #212529;" onclick="location.href='../pages/question_page.php'">
                                        <div class="comment-header d-flex justify-content-between flex-md-row flex-column mx-3 mt-3">
                                            <div class="username d-flex align-items-center" style="color: grey;">
                                                <img src="../images/bradpitt.jpg" class="rounded-circle me-2" width="40">
                                                <h5>bradpitt01</h5>
                                            </div>
                                            <div class="d-flex mt-sm-0 mt-3">
                                                <div class="comment-header-icons d-flex justify-content-end align-items-center me-sm-4">
                                                    <span class="material-icons edit-icon me-lg-4 me-2 d-sm-block d-none" style="font-size: 25px;">
                                                    mode_edit
                                                    </span>
                                                    <span class="material-icons delete-icon d-sm-block d-none" style="font-size: 25px;">
                                                    delete
                                                    </span> 
                                                </div>
                                                <button class="btn btn-dark">Check the question</button>
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
                                    <div class="container d-flex justify-content-center flex-direction-column my-5" style="">
                                        <button type="button" class="btn read-more rounded d-flex justify-content-center">
                                            <span class="material-icons me-1">
                                                add_box
                                            </span>
                                            Read More
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
        </div>
    </section>


<?php
    }
?>

