<?php 
    class Space {           // works as an enum
        static public $SCIENCE = "SCIENCE";
        static public $ENGINEERING = "ENGINEERING";
        static public $TECH = "Technology";
        static public $MATHS = "MATHS";
    }

    function draw_question_card($photo_name, $title, $username, $nr_likes, $nr_answers, $date, $space) { ?>
        <div class="card mb-4 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
            <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                <div class="username mt-2 d-flex align-items-center col-6">
                    <img src="../images/tomcruise.jpg" class="rounded-circle me-2" width="60">
                    <h4><?=$username?></h4>
                </div>
                <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
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
                        }
                    ?>
                </div>
            </div>
            <ul class="list-group list-group-flush mt-3">
            </ul>
            <div class="question-title">
            
                <div class="question-title-text row ms-2 mt-3 me-2 text-start">
                    <h2><?=$title?></h2>
                </div>
                <div class="votes mt-2 d-flex justify-content-center">
                    <span class="left material-icons me-4" >
                        arrow_drop_down
                    </span>
                    <?=$nr_likes?>
                    <span class="right material-icons ms-4" >
                        arrow_drop_up
                    </span>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center">
                <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                    <button type="button" class="nr_answers btn btn-outline-dark rounded" >
                        <?=$nr_answers?> answers
                    </button>
                </div>
                <div class="col-6 col-sm-6 ms-md-4 ms-sm-2 ms-0 text-end text-sm-start text-muted" style="font-weight:bolder;">
                    <?=$date?>
                </div>
                <div class="col-1 ms-0 d-none d-sm-block">
                    <span class="report-icon material-icons me-1">
                        flag
                    </span>
                </div>
            </div>
        </div>
<?php    }

    function draw_science_space() {
?>
    <section class="space-header jumbotron text-center mt-5">
        <div class="container">
            <h1 class="jumbotron-heading">Science Space</h1>
            <p class="lead text-muted">“Science is not only a disciple of reason but also one of romance and passion.” – Stephen Hawking</p>
            <p>
                <a href="../pages/add_question.php" class="btn btn-add-question my-2">Add Question</a>
            </p>
        </div>
        <br>
        <ul class="nav nav-pills mb-3 container px-0" id="pills-tab" role="tablist">
            <li class="col-4 d-flex justify-content-center nav-item" role="presentation">
                <button class="button-tab-filter nav-link active" id="pills-recent-tab" data-bs-toggle="pill" data-bs-target="#pills-recent" type="button" role="tab" aria-controls="pills-recent" aria-selected="true">Recent</button>
            </li>
            <li class="col-4 d-flex justify-content-center nav-item" role="presentation">
                <button class="button-tab-filter nav-link" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="false">Popular</button>
            </li>
            <li class="col-4 d-flex justify-content-center nav-item" role="presentation">
                <button class="button-tab-filter nav-link" id="pills-upvotes-tab" data-bs-toggle="pill" data-bs-target="#pills-upvotes" type="button" role="tab" aria-controls="pills-upvotes" aria-selected="false">Most Upvotes</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-recent" role="tabpanel" aria-labelledby="pills-recent-tab">
                <div class="space-page-feed py-5 bg-light" style="">
                    <div class="feed container">
                        <div class="row">
                            <div class="col-12 mt-4">
                                <div class="card mb-4 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/tomcruise.jpg" class="rounded-circle me-2" width="60">
                                            <h4>tomcruise17</h4>
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
                                            77
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex col-6">
                                            <img src="../images/tomcruise.jpg" class="rounded-circle me-2" width="60">
                                            <h4>tomcruise17</h4>
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
                                            77
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/tomcruise.jpg" class="rounded-circle me-2" width="60">
                                            <h4>tomcruise17</h4>
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
                                            77
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
                            </div>
                        
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/tomcruise.jpg" class="rounded-circle me-2" width="60">
                                            <h4>tomcruise17</h4>
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
                                            77
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/tomcruise.jpg" class="rounded-circle me-2" width="60">
                                            <h4>tomcruise17</h4>
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
                                            77
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
            <div class="tab-pane fade" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                <div class="space-page-feed py-5 bg-light" style="">
                    <div class="feed container">

                        <div class="row">
                        
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/tomcruise.jpg" class="rounded-circle me-2" width="60">
                                            <h4>tomcruise17</h4>
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
                                            77
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/tomcruise.jpg" class="rounded-circle me-2" width="60">
                                            <h4>tomcruise17</h4>
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
                                            77
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
                            </div>

                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/tomcruise.jpg" class="rounded-circle me-2" width="60">
                                            <h4>tomcruise17</h4>
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
                                            77
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/tomcruise.jpg" class="rounded-circle me-2" width="60">
                                            <h4>tomcruise17</h4>
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
                                            77
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/tomcruise.jpg" class="rounded-circle me-2" width="60">
                                            <h4>tomcruise17</h4>
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
                                            77
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
            <div class="tab-pane fade" id="pills-upvotes" role="tabpanel" aria-labelledby="pills-upvotes-tab">
                <div class="space-page-feed py-5 bg-light" style="">
                    <div class="feed container">
                        <div class="row">
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/tomcruise.jpg" class="rounded-circle me-2" width="60">
                                            <h4>tomcruise17</h4>
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
                                            77
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
                            </div>

                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/tomcruise.jpg" class="rounded-circle me-2" width="60">
                                            <h4>tomcruise17</h4>
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
                                            77
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/tomcruise.jpg" class="rounded-circle me-2" width="60">
                                            <h4>tomcruise17</h4>
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
                                            77
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/tomcruise.jpg" class="rounded-circle me-2" width="60">
                                            <h4>tomcruise17</h4>
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
                                            77
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
    </section>

    
<?php
    }

    function draw_tech_space() {
?>
    <section class="space-header jumbotron text-center mt-5">
        <div class="container">
            <h1 class="jumbotron-heading">Technology Space</h1>
            <p class="lead text-muted">“The advance of technology is based on making it fit in so that you don't really even notice it, so it's part of everyday life.” - Bill Gates
            </p>
            <p>
                <a href="../pages/add_question.php" class="btn btn-add-question my-2">Add Question</a>
            </p>
        </div>
        <br>
        <ul class="nav nav-pills mb-3 container px-0" id="pills-tab" role="tablist">
            <li class="col-4 d-flex justify-content-center nav-item" role="presentation">
                <button class="button-tab-filter nav-link active" id="pills-recent-tab" data-bs-toggle="pill" data-bs-target="#pills-recent" type="button" role="tab" aria-controls="pills-recent" aria-selected="true">Recent</button>
            </li>
            <li class="col-4 d-flex justify-content-center nav-item" role="presentation">
                <button class="button-tab-filter nav-link" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="false">Popular</button>
            </li>
            <li class="col-4 d-flex justify-content-center nav-item" role="presentation">
                <button class="button-tab-filter nav-link" id="pills-upvotes-tab" data-bs-toggle="pill" data-bs-target="#pills-upvotes" type="button" role="tab" aria-controls="pills-upvotes" aria-selected="false">Most Upvotes</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-recent" role="tabpanel" aria-labelledby="pills-recent-tab">
                <div class="space-page-feed py-5 bg-light" style="">
                    <div class="feed container">
                        <div class="row">
                            <div class="col-12 mt-4">
                                <?=draw_question_card("../images/tomcruise.jpg", "Why is an Apple computer called a Mac?", "davidlynch12", "121", "25", "12:00 - 11/03/2021", Space::$TECH)?>
                            </div>
                            <div class="col-12 mt-4">
                                <?=draw_question_card("../images/tomcruise.jpg", "Why is an Apple computer called a Mac?", "davidlynch12", "121", "25", "12:00 - 11/03/2021", Space::$TECH)?>
                            </div>
                            <div class="col-12 mt-4">
                                <?=draw_question_card("../images/tomcruise.jpg", "Why is an Apple computer called a Mac?", "davidlynch12", "121", "25", "12:00 - 11/03/2021", Space::$TECH)?>
                            </div>
                            <div class="col-12 mt-4">
                                <?=draw_question_card("../images/tomcruise.jpg", "Why is an Apple computer called a Mac?", "davidlynch12", "121", "25", "12:00 - 11/03/2021", Space::$TECH)?>
                            </div>
                            <div class="col-12 mt-4">
                                <?=draw_question_card("../images/tomcruise.jpg", "Why is an Apple computer called a Mac?", "davidlynch12", "121", "25", "12:00 - 11/03/2021", Space::$TECH)?>
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
            <div class="tab-pane fade" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                <div class="space-page-feed py-5 bg-light" style="">
                    <div class="feed container">
                        <div class="row">
                            <div class="col-12 mt-4">
                                <div class="card mb-4 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/davidlynch.jpg" class="rounded-circle me-2" width="60">
                                            <h4>davidlynch12</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-sm-end justify-content-start">
                                            <button type="button" class="btn btn-outline-primary rounded float-sm-end me-3">Technology</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>Why is an Apple computer called a Mac?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            121
                                            <span class="right material-icons ms-4" >
                                                arrow_drop_up
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                                            <button type="button" class="nr_answers btn btn-outline-dark rounded">
                                                25 answers
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
                            </div>
                            
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/davidlynch.jpg" class="rounded-circle me-2" width="60">
                                            <h4>davidlynch12</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="btn btn-outline-primary rounded float-sm-end me-3">Technology</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>Why is an Apple computer called a Mac?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            121
                                            <span class="right material-icons ms-4" >
                                                arrow_drop_up
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                                            <button type="button" class="nr_answers btn btn-outline-dark rounded">
                                                25 answers
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/davidlynch.jpg" class="rounded-circle me-2" width="60">
                                            <h4>davidlynch12</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="btn btn-outline-primary rounded float-sm-end me-3">Technology</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>Why is an Apple computer called a Mac?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            121
                                            <span class="right material-icons ms-4" >
                                                arrow_drop_up
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                                            <button type="button" class="nr_answers btn btn-outline-dark rounded">
                                                25 answers
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/davidlynch.jpg" class="rounded-circle me-2" width="60">
                                            <h4>davidlynch12</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="btn btn-outline-primary rounded float-sm-end me-3">Technology</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>Why is an Apple computer called a Mac?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            121
                                            <span class="right material-icons ms-4" >
                                                arrow_drop_up
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                                            <button type="button" class="nr_answers btn btn-outline-dark rounded">
                                                25 answers
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/davidlynch.jpg" class="rounded-circle me-2" width="60">
                                            <h4>davidlynch12</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="btn btn-outline-primary rounded float-sm-end me-3">Technology</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>Why is an Apple computer called a Mac?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            121
                                            <span class="right material-icons ms-4" >
                                                arrow_drop_up
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                                            <button type="button" class="nr_answers btn btn-outline-dark rounded">
                                                25 answers
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
            <div class="tab-pane fade" id="pills-upvotes" role="tabpanel" aria-labelledby="pills-upvotes-tab">
                <div class="space-page-feed py-5 bg-light" style="">
                    <div class="feed container">

                        <div class="row">
                            <div class="col-12 mt-4">
                                <div class="card mb-4 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/davidlynch.jpg" class="rounded-circle me-2" width="60">
                                            <h4>davidlynch12</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-sm-end justify-content-start">
                                            <button type="button" class="btn btn-outline-primary rounded float-sm-end me-3">Technology</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>Why is an Apple computer called a Mac?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            121
                                            <span class="right material-icons ms-4" >
                                                arrow_drop_up
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                                            <button type="button" class="nr_answers btn btn-outline-dark rounded">
                                                25 answers
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
                            </div>
                            
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/davidlynch.jpg" class="rounded-circle me-2" width="60">
                                            <h4>davidlynch12</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="btn btn-outline-primary rounded float-sm-end me-3">Technology</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>Why is an Apple computer called a Mac?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            121
                                            <span class="right material-icons ms-4" >
                                                arrow_drop_up
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                                            <button type="button" class="nr_answers btn btn-outline-dark rounded">
                                                25 answers
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/davidlynch.jpg" class="rounded-circle me-2" width="60">
                                            <h4>davidlynch12</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="btn btn-outline-primary rounded float-sm-end me-3">Technology</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>Why is an Apple computer called a Mac?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            121
                                            <span class="right material-icons ms-4" >
                                                arrow_drop_up
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                                            <button type="button" class="nr_answers btn btn-outline-dark rounded">
                                                25 answers
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
    </section>

    
<?php
    }

    function draw_engineering_space() {
?>
    <section class="space-header jumbotron text-center mt-5">
        <div class="container">
            <h1 class="jumbotron-heading">Engineering Space</h1>
            <p class="lead text-muted">“Engineers like to solve problems. If there are no problems handily available, they will create their own problems." - Scott Adams</p>
            <p>
                <a href="../pages/add_question.php" class="btn btn-add-question my-2">Add Question</a>
            </p>
        </div>
        <br>
        <ul class="nav nav-pills mb-3 container px-0" id="pills-tab" role="tablist">
            <li class="col-4 d-flex justify-content-center nav-item" role="presentation">
                <button class="button-tab-filter nav-link active" id="pills-recent-tab" data-bs-toggle="pill" data-bs-target="#pills-recent" type="button" role="tab" aria-controls="pills-recent" aria-selected="true">Recent</button>
            </li>
            <li class="col-4 d-flex justify-content-center nav-item" role="presentation">
                <button class="button-tab-filter nav-link" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="false">Popular</button>
            </li>
            <li class="col-4 d-flex justify-content-center nav-item" role="presentation">
                <button class="button-tab-filter nav-link" id="pills-upvotes-tab" data-bs-toggle="pill" data-bs-target="#pills-upvotes" type="button" role="tab" aria-controls="pills-upvotes" aria-selected="false">Most Upvotes</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-recent" role="tabpanel" aria-labelledby="pills-recent-tab">
                <div class="space-page-feed py-5 bg-light" style="">
                    <div class="feed container">

                        <div class="row">
                            <div class="col-12 mt-4">
                                <div class="card mb-4 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/scarlett.jpg" class="rounded-circle me-2" width="60">
                                            <h4>scarlett21</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="engine btn btn-outline-primary rounded float-sm-end me-3">Engineering</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>What is a heterodyne frequency changer?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            89
                                            <span class="right material-icons ms-4" >
                                                arrow_drop_up
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                                            <button type="button" class="nr_answers btn btn-outline-dark rounded">
                                                27 answers
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
                            </div>
                            
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/scarlett.jpg" class="rounded-circle me-2" width="60">
                                            <h4>scarlett21</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="engine btn btn-outline-primary rounded float-sm-end me-3">Engineering</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>What is a heterodyne frequency changer?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            89
                                            <span class="right material-icons ms-4" >
                                                arrow_drop_up
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                                            <button type="button" class="nr_answers btn btn-outline-dark rounded">
                                                27 answers
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/scarlett.jpg" class="rounded-circle me-2" width="60">
                                            <h4>scarlett21</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="engine btn btn-outline-primary rounded float-sm-end me-3">Engineering</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>What is a heterodyne frequency changer?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            89
                                            <span class="right material-icons ms-4" >
                                                arrow_drop_up
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                                            <button type="button" class="nr_answers btn btn-outline-dark rounded">
                                                27 answers
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/scarlett.jpg" class="rounded-circle me-2" width="60">
                                            <h4>scarlett21</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="engine btn btn-outline-primary rounded float-sm-end me-3">Engineering</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>What is a heterodyne frequency changer?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            89
                                            <span class="right material-icons ms-4" >
                                                arrow_drop_up
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                                            <button type="button" class="nr_answers btn btn-outline-dark rounded">
                                                27 answers
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
            <div class="tab-pane fade" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                <div class="space-page-feed py-5 bg-light" style="">
                    <div class="feed container">

                        <div class="row">
                            <div class="col-12 mt-4">
                                <div class="card mb-4 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/scarlett.jpg" class="rounded-circle me-2" width="60">
                                            <h4>scarlett21</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-sm-end justify-content-start">
                                            <button type="button" class="engine btn btn-outline-primary rounded float-sm-end me-3">Engineering</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>What is a heterodyne frequency changer?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            89
                                            <span class="right material-icons ms-4" >
                                                arrow_drop_up
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                                            <button type="button" class="nr_answers btn btn-outline-dark rounded">
                                                27 answers
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
                            </div>
                            
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/scarlett.jpg" class="rounded-circle me-2" width="60">
                                            <h4>scarlett21</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="engine btn btn-outline-primary rounded float-sm-end me-3">Engineering</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>What is a heterodyne frequency changer?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            89
                                            <span class="right material-icons ms-4" >
                                                arrow_drop_up
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                                            <button type="button" class="nr_answers btn btn-outline-dark rounded">
                                                27 answers
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/scarlett.jpg" class="rounded-circle me-2" width="60">
                                            <h4>scarlett21</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="engine btn btn-outline-primary rounded float-sm-end me-3">Engineering</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>What is a heterodyne frequency changer?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            89
                                            <span class="right material-icons ms-4" >
                                                arrow_drop_up
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                                            <button type="button" class="nr_answers btn btn-outline-dark rounded">
                                                27 answers
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/scarlett.jpg" class="rounded-circle me-2" width="60">
                                            <h4>scarlett21</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="engine btn btn-outline-primary rounded float-sm-end me-3">Engineering</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>What is a heterodyne frequency changer?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            89
                                            <span class="right material-icons ms-4" >
                                                arrow_drop_up
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                                            <button type="button" class="nr_answers btn btn-outline-dark rounded">
                                                27 answers
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/scarlett.jpg" class="rounded-circle me-2" width="60">
                                            <h4>scarlett21</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="engine btn btn-outline-primary rounded float-sm-end me-3">Engineering</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>What is a heterodyne frequency changer?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            89
                                            <span class="right material-icons ms-4" >
                                                arrow_drop_up
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                                            <button type="button" class="nr_answers btn btn-outline-dark rounded">
                                                27 answers
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
            <div class="tab-pane fade" id="pills-upvotes" role="tabpanel" aria-labelledby="pills-upvotes-tab">
                <div class="space-page-feed py-5 bg-light" style="">
                    <div class="feed container">

                        <div class="row">
                            <div class="col-12 mt-4">
                                <div class="card mb-4 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/scarlett.jpg" class="rounded-circle me-2" width="60">
                                            <h4>scarlett21</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-sm-end justify-content-start">
                                            <button type="button" class="engine btn btn-outline-primary rounded float-sm-end me-3">Engineering</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>What is a heterodyne frequency changer?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            89
                                            <span class="right material-icons ms-4" >
                                                arrow_drop_up
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                                            <button type="button" class="nr_answers btn btn-outline-dark rounded">
                                                27 answers
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
                            </div>
                            
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/scarlett.jpg" class="rounded-circle me-2" width="60">
                                            <h4>scarlett21</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="engine btn btn-outline-primary rounded float-sm-end me-3">Engineering</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>What is a heterodyne frequency changer?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            89
                                            <span class="right material-icons ms-4" >
                                                arrow_drop_up
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                                            <button type="button" class="nr_answers btn btn-outline-dark rounded">
                                                27 answers
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/scarlett.jpg" class="rounded-circle me-2" width="60">
                                            <h4>scarlett21</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="engine btn btn-outline-primary rounded float-sm-end me-3">Engineering</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>What is a heterodyne frequency changer?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            89
                                            <span class="right material-icons ms-4" >
                                                arrow_drop_up
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex align-items-center">
                                        <div class="col-sm-5 col-6 ms-1 text-muted d-flex justify-content-start" style="font-weight:bolder;">
                                            <button type="button" class="nr_answers btn btn-outline-dark rounded">
                                                27 answers
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
    </section>

    
<?php
    }
?>


<?php
    function draw_maths_space() {
?>
    <section class="space-header jumbotron text-center mt-5">
        <div class="container">
            <h1 class="jumbotron-heading">Maths Space</h1>
            <p class="lead text-muted">"Pure mathematics is, in its way, the poetry of logical ideas." - Albert Einstein</p>
            <p>
                <a href="../pages/add_question.php" class="btn btn-add-question my-2">Add Question</a>
            </p>
        </div>
        <br>
        <ul class="nav nav-pills mb-3 container px-0" id="pills-tab" role="tablist">
            <li class="col-4 d-flex justify-content-center nav-item" role="presentation">
                <button class="button-tab-filter nav-link active" id="pills-recent-tab" data-bs-toggle="pill" data-bs-target="#pills-recent" type="button" role="tab" aria-controls="pills-recent" aria-selected="true">Recent</button>
            </li>
            <li class="col-4 d-flex justify-content-center nav-item" role="presentation">
                <button class="button-tab-filter nav-link" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="false">Popular</button>
            </li>
            <li class="col-4 d-flex justify-content-center nav-item" role="presentation">
                <button class="button-tab-filter nav-link" id="pills-upvotes-tab" data-bs-toggle="pill" data-bs-target="#pills-upvotes" type="button" role="tab" aria-controls="pills-upvotes" aria-selected="false">Most Upvotes</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-recent" role="tabpanel" aria-labelledby="pills-recent-tab">
                <div class="space-page-feed py-5 bg-light" style="">
                    <div class="feed container">

                        <div class="row">
                            <div class="col-12 mt-4">
                                <div class="card mb-4 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/alpacino.jpg" class="rounded-circle me-2" width="60">
                                            <h4>alpacino89</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="btn btn-outline-danger rounded float-sm-end me-3">Maths</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>The base of a right-angled triangle is 9.5 cm and the area is 95 cm square. What is its height?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            52
                                            <span class="right material-icons ms-4" >
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
                            </div>
                            
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/alpacino.jpg" class="rounded-circle me-2" width="60">
                                            <h4>alpacino89</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="btn btn-outline-danger rounded float-sm-end me-3">Maths</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>The base of a right-angled triangle is 9.5 cm and the area is 95 cm square. What is its height?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            52
                                            <span class="right material-icons ms-4" >
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/alpacino.jpg" class="rounded-circle me-2" width="60">
                                            <h4>alpacino89</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="btn btn-outline-danger rounded float-sm-end me-3">Maths</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>The base of a right-angled triangle is 9.5 cm and the area is 95 cm square. What is its height?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            52
                                            <span class="right material-icons ms-4" >
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/alpacino.jpg" class="rounded-circle me-2" width="60">
                                            <h4>alpacino89</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="btn btn-outline-danger rounded float-sm-end me-3">Maths</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>The base of a right-angled triangle is 9.5 cm and the area is 95 cm square. What is its height?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            52
                                            <span class="right material-icons ms-4" >
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
            <div class="tab-pane fade" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                <div class="space-page-feed py-5 bg-light" style="">
                    <div class="feed container">

                        <div class="row">
                            <div class="col-12 mt-4">
                                <div class="card mb-4 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/alpacino.jpg" class="rounded-circle me-2" width="60">
                                            <h4>alpacino89</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-sm-end justify-content-start">
                                            <button type="button" class="btn btn-outline-danger rounded float-sm-end me-3">Maths</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>The base of a right-angled triangle is 9.5 cm and the area is 95 cm square. What is its height?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            52
                                            <span class="right material-icons ms-4" >
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
                            </div>
                            
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/alpacino.jpg" class="rounded-circle me-2" width="60">
                                            <h4>alpacino89</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="btn btn-outline-danger rounded float-sm-end me-3">Maths</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>The base of a right-angled triangle is 9.5 cm and the area is 95 cm square. What is its height?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            52
                                            <span class="right material-icons ms-4" >
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/alpacino.jpg" class="rounded-circle me-2" width="60">
                                            <h4>alpacino89</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="btn btn-outline-danger rounded float-sm-end me-3">Maths</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>The base of a right-angled triangle is 9.5 cm and the area is 95 cm square. What is its height?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            52
                                            <span class="right material-icons ms-4" >
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/alpacino.jpg" class="rounded-circle me-2" width="60">
                                            <h4>alpacino89</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="btn btn-outline-danger rounded float-sm-end me-3">Maths</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>The base of a right-angled triangle is 9.5 cm and the area is 95 cm square. What is its height?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            52
                                            <span class="right material-icons ms-4" >
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/alpacino.jpg" class="rounded-circle me-2" width="60">
                                            <h4>alpacino89</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="btn btn-outline-danger rounded float-sm-end me-3">Maths</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>The base of a right-angled triangle is 9.5 cm and the area is 95 cm square. What is its height?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            52
                                            <span class="right material-icons ms-4" >
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
            <div class="tab-pane fade" id="pills-upvotes" role="tabpanel" aria-labelledby="pills-upvotes-tab">
                <div class="space-page-feed py-5 bg-light" style="">
                    <div class="feed container">

                        <div class="row">
                            <div class="col-12 mt-4">
                                <div class="card mb-4 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/alpacino.jpg" class="rounded-circle me-2" width="60">
                                            <h4>alpacino89</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-sm-end justify-content-start">
                                            <button type="button" class="btn btn-outline-danger rounded float-sm-end me-3">Maths</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>The base of a right-angled triangle is 9.5 cm and the area is 95 cm square. What is its height?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            52
                                            <span class="right material-icons ms-4" >
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
                            </div>
                            
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/alpacino.jpg" class="rounded-circle me-2" width="60">
                                            <h4>alpacino89</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="btn btn-outline-danger rounded float-sm-end me-3">Maths</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>The base of a right-angled triangle is 9.5 cm and the area is 95 cm square. What is its height?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            52
                                            <span class="right material-icons ms-4" >
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
                            </div>
                            <div class="col-12 mt-4">
                                <div class="card mb-4 box-shadow" style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                                    <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                        <div class="username mt-2 d-flex align-items-center col-6">
                                            <img src="../images/alpacino.jpg" class="rounded-circle me-2" width="60">
                                            <h4>alpacino89</h4>
                                        </div>
                                        <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                            <button type="button" class="btn btn-outline-danger rounded float-sm-end me-3">Maths</button>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush mt-3">
                                    </ul>
                                    <div class="question-title">
                                    
                                        <div class="question-title-text row ms-2 mt-3 me-2 text-start" onclick="location.href='../pages/question_page.php'">
                                            <h2>The base of a right-angled triangle is 9.5 cm and the area is 95 cm square. What is its height?</h2>
                                        </div>
                                        <div class="votes mt-2 d-flex justify-content-center">
                                            <span class="left material-icons me-4" >
                                                arrow_drop_down
                                            </span>
                                            52
                                            <span class="right material-icons ms-4" >
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
    </section>

    
<?php
    }
?>
