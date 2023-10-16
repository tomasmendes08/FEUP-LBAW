<?php
 function draw_question_card_report($photo_name, $title, $username, $nr_likes, $nr_answers, $date, $space) { ?>
    <div class="card mb-3" style="border: solid 1px #212529;">
        <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
            <div class="username mt-2 d-flex align-items-center col-6">
                <img src=<?=$photo_name?> class="rounded-circle me-2 my-auto" width="60">
                <h5><?=$username?></h5>
            </div>
            <div class="question-space col-6 mt-3 d-flex justify-content-sm-end">
                <?php
                    switch ($space) {
                        case Space::$SCIENCE:
                            ?><button type="button" class="btn btn-outline-success rounded float-sm-end me-3"><?=$space?></button><?php
                            break;
                        case Space::$TECH:
                            ?><button type="button" class="btn btn-outline-primary rounded float-sm-end me-3"><?=$space?></button><?php
                            break;
                        case Space::$ENGINEERING:
                            ?><button type="button" class="engine btn btn-outline-primary rounded float-sm-end me-3"><?=$space?></button><?php
                            break;
                        case Space::$MATHS:
                            ?><button type="button" class="btn btn-outline-danger rounded float-sm-end me-3"><?=$space?></button><?php
                            break;
                        default:
                            break;
                    }
                ?>
            </div>
        </div>
        <ul class="list-group list-group-flush mt-3">
        </ul>
        <div class="question-title" >
        
            <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                <h2><?=$title?></h2>
            </div>
            <div class="votes mt-2 d-flex justify-content-center">
                <span class="left material-icons me-4" >
                    arrow_drop_down
                </span>
                <span class="fs-3 my-auto">
                    <?=$nr_likes?>
                </span>
                <span class="right material-icons ms-4" >
                    arrow_drop_up
                </span>
            </div>
        </div>
        <div class="card-footer d-flex flex-md-row flex-column ">
            <div class="container d-flex px-0 my-md-0 my-1 me-1 align-items-center justify-content-between">
                <div class="mx-md-auto text-muted justify-content-start" style="font-weight:bolder;">
                    <button type="button" class="nr_answers btn btn-outline-dark rounded" >
                        <?=$nr_answers?> answers
                    </button>
                </div>
                <div class="mx-md-auto text-end text-sm-start text-muted" style="font-weight:bolder;">
                    <?=$date?>
                </div>
            </div>
            <div class="container d-flex px-0 my-md-0 my-1 me-1 align-items-center justify-content-between">
                <div class="mx-md-auto ">
                    <button type="button" class="btn btn-delete-question">Delete Question</button>
                </div>

                <div class="mx-md-auto ">
                    <button type="button" class="btn btn-ban-user">Ban User</button>
                </div> 
            </div>
        </div>
    </div>
<?php    }

    function draw_admin_answer_card() { ?>
        <div class="answer">
            <div class="card card-answer mb-4 border border-dark">
                <div class="answer-header d-flex flex-sm-row flex-column container" >
                    <div class="username my-2 d-flex align-items-center col-6" style="color: grey;">
                        <img src="../images/tomcruise.jpg" class="rounded-circle me-2" width="60">
                        <h5>tomcruise17</h5>
                    </div>
                    <a href="../pages/question_page.php" class="col-sm-6 d-flex justify-content-sm-end align-items-center text-decoration-none my-3 my-sm-auto"><button class="btn btn-dark">Check the Question</button>
                    </a>
                                                        
                </div>
                <ul class="list-group list-group-flush ">
                </ul>
                <div class="answer-title">
                    <div class="container d-flex mx-0">
                        <div class="answer-title-secondary-text mt-3 ">
                            <p>Alchemy is best described as a form of proto-science rather than a distinct science in its own right. This is because, although many observations and theories made by alchemists were based on scientific fact, they often explained these in terms of magic or divine intervention.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="votes col-12 mt-1 d-flex justify-content-center align-items-center">
                            <span class="left material-icons me-sm-4 me-xs-3 me-2" >
                                arrow_drop_down
                            </span>
                            <span class="fs-4">
                            -26
                            </span>
                            <span class="right material-icons ms-sm-4 ms-xs-3 ms-2" >
                                arrow_drop_up
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex flex-md-row flex-column ">
                    <div class="container d-flex px-0 my-md-0 my-1 me-1 align-items-center justify-content-between">
                        <div class="mx-md-auto text-muted justify-content-start" style="font-weight:bolder;">
                            <button type="button" class="nr_answers btn btn-outline-dark rounded" >
                            2 comments
                            </button>
                        </div>
                        <div class="mx-md-auto text-end text-sm-start text-muted" style="font-weight:bolder;">
                            12:00 - 11/03/2021
                        </div>
                    </div>
                    <div class="container d-flex px-0 my-md-0 my-1 me-1 align-items-center justify-content-between">
                        <div class="mx-md-auto ">
                            <button type="button" class="btn btn-delete-question">Delete Answer</button>
                        </div>

                        <div class="mx-md-auto ">
                        <button type="button" class="btn btn-ban-user">Ban User</button>
                        </div> 
                    </div>
                </div>

               
            </div>
        </div>
    <?php }

    function draw_admin_comment_card() { ?>
        <div class="comment rounded" style="border: solid 1px #212529;">
            <div class="comment-header d-flex flex-row justify-content-between mx-3 mt-3">
                <div class="username d-flex align-items-center me-3 me-sm-0" style="color: grey;">
                    <img src="../images/bradpitt.jpg" class="rounded-circle me-2" width="60">
                    <h5>bradpitt17</h5>
                </div>
                <div class="comment-header-icons d-flex align-items-center">
                    <a href="../pages/question_page.php" class="d-flex justify-content-end align-items-center text-decoration-none my-auto"><button class="btn btn-dark">Check the Question</button>
                    </a>
                </div>
            </div>
            <div class="comment-text col-10 mt-3 ms-3">
                <p>That's not cool!</p>
            </div>
                        
            <div class="card-footer d-flex flex-md-row flex-column ">
                    <div class="container d-flex px-0 my-md-0 my-1 me-1 align-items-center justify-content-between">
                        <div class="mx-auto text-end text-sm-start text-muted" style="font-weight:bolder;">
                            12:00 - 11/03/2021
                        </div>
                    </div>
                    <div class="container d-flex px-0 my-md-0 my-1 me-1 align-items-center justify-content-between">
                        <div class="mx-md-auto">
                            <button type="button" class="btn btn-delete-question">Delete Comment</button>
                        </div>
                        <div class="mx-md-auto">
                            <button type="button" class="btn btn-ban-user">Ban User</button>
                        </div> 
                    </div>
                </div>

        </div>
    <?php    }

    function draw_admin_reported_posts_title() { ?>
            <div class="d-flex my-4 align-items-center justify-content-center">
                <div class="">
                    <img src="../images/scarlett.jpg" class="flex-shrink-0 rounded-circle" alt="..." style="width:13em; height:13em;">
                </div>
                <div class="mt-3 mb-3 px-3">
                    <h2>Reported posts of scarlett21</h2>
                </div>
            </div>

              
<?php    }

    function draw_admin_reported_posts_feed() { 
        draw_question_card_report("../images/scarlett.jpg", "Hello, why is biology considered science?", "scarlett21", "321", "3", "12:00 - 11/03/2021", Space::$SCIENCE);
        draw_question_card_report("../images/scarlett.jpg", "Hello, why is biology considered science?", "scarlett21", "321", "3", "12:00 - 11/03/2021", Space::$SCIENCE);
        draw_question_card_report("../images/scarlett.jpg", "Hello, why is biology considered science?", "scarlett21", "321", "3", "12:00 - 11/03/2021", Space::$SCIENCE);
        draw_question_card_report("../images/scarlett.jpg", "Hello, why is biology considered science?", "scarlett21", "321", "3", "12:00 - 11/03/2021", Space::$SCIENCE);
    }

    function draw_admin_top_posts_title() { ?>
            <div class="d-flex my-4 align-items-center justify-content-center">
                <div class="">
                    <img src="../images/scarlett.jpg" class="flex-shrink-0 rounded-circle" alt="..." style="width:13em; height:13em;">
                </div>
                <div class="mt-3 mb-3 px-3">
                    <h2>Top posts of scarlett21</h2>
                </div>
            </div>
<?php    }

    function draw_admin_top_posts_feed() { ?>
        <div class="card mb-4 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
            <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                <div class="username mt-2 d-flex align-items-center col-6">
                    <img src="../images/scarlett.jpg" class="rounded-circle me-2" width="60">
                    <h4>scarlett21</h4>
                </div>
                <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                    <button type="button" class="btn btn-outline-success rounded float-sm-end me-3">Science</button>
                </div>
            </div>
            <ul class="list-group list-group-flush mt-3">
            </ul>
            <div class="question-title">
            
                <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                    <h2>Why isn't alchemy considered a science?</h2>
                </div>
                <div class="votes mt-2 d-flex justify-content-center">
                    <span class="left material-icons me-4" >
                        arrow_drop_down
                    </span>
                    1342
                    <span class="right material-icons ms-4" >
                        arrow_drop_up
                    </span>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center">
                <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                    <button type="button" class="nr_answers btn btn-outline-dark rounded" >
                        5 answers
                    </button>
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
        <div class="card mb-4 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
            <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                <div class="username mt-2 d-flex align-items-center col-6">
                    <img src="../images/scarlett.jpg" class="rounded-circle me-2" width="60">
                    <h4>scarlett21</h4>
                </div>
                <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                    <button type="button" class="btn btn-outline-success rounded float-sm-end me-3">Science</button>
                </div>
            </div>
            <ul class="list-group list-group-flush mt-3">
            </ul>
            <div class="question-title">
            
                <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                    <h2>Why isn't alchemy considered a science?</h2>
                </div>
                <div class="votes mt-2 d-flex justify-content-center">
                    <span class="left material-icons me-4" >
                        arrow_drop_down
                    </span>
                    150
                    <span class="right material-icons ms-4" >
                        arrow_drop_up
                    </span>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center">
                <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                    <button type="button" class="nr_answers btn btn-outline-dark rounded" >
                        5 answers
                    </button>
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
        <div class="card mb-4 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
            <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                <div class="username mt-2 d-flex align-items-center col-6">
                    <img src="../images/scarlett.jpg" class="rounded-circle me-2" width="60">
                    <h4>scarlett21</h4>
                </div>
                <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                    <button type="button" class="btn btn-outline-success rounded float-sm-end me-3">Science</button>
                </div>
            </div>
            <ul class="list-group list-group-flush mt-3">
            </ul>
            <div class="question-title">
            
                <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                    <h2>Why isn't alchemy considered a science?</h2>
                </div>
                <div class="votes mt-2 d-flex justify-content-center">
                    <span class="left material-icons me-4" >
                        arrow_drop_down
                    </span>
                    50
                    <span class="right material-icons ms-4" >
                        arrow_drop_up
                    </span>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center">
                <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                    <button type="button" class="nr_answers btn btn-outline-dark rounded" >
                        5 answers
                    </button>
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
        <div class="card mb-4 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
            <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                <div class="username mt-2 d-flex align-items-center col-6">
                    <img src="../images/scarlett.jpg" class="rounded-circle me-2" width="60">
                    <h4>scarlett21</h4>
                </div>
                <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                    <button type="button" class="btn btn-outline-success rounded float-sm-end me-3">Science</button>
                </div>
            </div>
            <ul class="list-group list-group-flush mt-3">
            </ul>
            <div class="question-title">
            
                <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                    <h2>Why isn't alchemy considered a science?</h2>
                </div>
                <div class="votes mt-2 d-flex justify-content-center">
                    <span class="left material-icons me-4" >
                        arrow_drop_down
                    </span>
                    10
                    <span class="right material-icons ms-4" >
                        arrow_drop_up
                    </span>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center">
                <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                    <button type="button" class="nr_answers btn btn-outline-dark rounded" >
                        5 answers
                    </button>
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
        <div class="card mb-4 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
            <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                <div class="username mt-2 d-flex align-items-center col-6">
                    <img src="../images/scarlett.jpg" class="rounded-circle me-2" width="60">
                    <h4>scarlett21</h4>
                </div>
                <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                    <button type="button" class="btn btn-outline-success rounded float-sm-end me-3">Science</button>
                </div>
            </div>
            <ul class="list-group list-group-flush mt-3">
            </ul>
            <div class="question-title">
            
                <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                    <h2>Why isn't alchemy considered a science?</h2>
                </div>
                <div class="votes mt-2 d-flex justify-content-center">
                    <span class="left material-icons me-4" >
                        arrow_drop_down
                    </span>
                    5
                    <span class="right material-icons ms-4" >
                        arrow_drop_up
                    </span>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center">
                <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                    <button type="button" class="nr_answers btn btn-outline-dark rounded" >
                        5 answers
                    </button>
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
<?php    }
?>
