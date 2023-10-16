<?php
    function draw_search() {
?>
    <div class="space mt-5 mx-3">
        
        <div class="row" style="">
            <aside id="side-bar" class="col-lg-3 mt-4 d-md-block sidebar accordion">
                <div class="accordion-item active" id="headingOne">
                    <h6 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="button" aria-expanded="false" data-bs-parent="#side-bar" id="filternew">
                        New Questions
                        </button>
                    </h6>
                </div>
                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="button" aria-expanded="false" data-bs-parent="#side-bar" id="filterbest">
                        Popular Questions
                        </button>
                    </h6>
                </div>
                <div class="accordion-item">
                    <h6 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" id="filterspaces" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" data-bs-parent="#side-bar">
                        Spaces
                        </button>
                    </h6>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#side-bar">
                        <div class="accordion-body">
                            <div>
                                <nav class="list-group">
                                    <button class="list-group-item list-group-item-action" id="filtersciencespace" data-bs-toggle="list">Science</button>
                                    <button class="list-group-item list-group-item-action" id="filtertechnologypace" data-bs-toggle="list">Technology</button>
                                    <button class="list-group-item list-group-item-action" id="filterengineeringpace" data-bs-toggle="list">Engineering</button>
                                    <button class="list-group-item list-group-item-action" id="filtermathsspace" data-bs-toggle="list">Maths</button>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <div class="col-lg-9 mt-4">
                <div class="row mb-4" style="">
                    <div class="question-feed-header d-flex justify-content-center align-items-center flex-column ">
                        <h2 style="font-weight:bolder;">Search Results for: 'S'</h2>
                    </div>
                </div>
                <div class="container d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
                <section class="question-section mt-2 d-flex justify-content-center">
                    <div class="col-12 mt-2">
                        <div class="card mb-4 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                            <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                <div class="username mt-2 d-flex align-items-center col-6">
                                    <img src="../images/tomcruise.jpg" class="rounded-circle me-2" width="60">
                                    <h4>tomcruise17</h4>
                                </div>
                                <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                    <button onclick="location.href='../pages/science_space.php'" type="button" class="btn btn-outline-success rounded float-sm-end me-3">Science</button>
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
                </section>
                <section class="user-section mt-4 d-flex justify-content-center">
                    <div class="col-12 mt-4">
                        <div class="card mb-4 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                            <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                <div class="username mt-2 d-flex align-items-center col-6">
                                    <img src="../images/tomcruise.jpg" class="rounded-circle me-2" width="60" onclick="location.href='../pages/question_page.php'">
                                    <h4>tomcruise17</h4>
                                </div>
                                <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                    <button onclick="location.href='../pages/profile.php'" type="button" class="btn btn-outline-dark rounded float-sm-end me-3">User Profile</button>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush mt-3">
                            </ul>
                        </div>
                    </div>
                </section>
                <section class="user-section mt-4 d-flex justify-content-center">
                    <div class="col-12 mt-4">
                        <div class="card mb-4 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                            <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                                <div class="username mt-2 d-flex align-items-center col-6">
                                    <img src="../images/science.png" class="card-img-top img-fluid me-1" alt="..." style="width:55px; height:55px;">
                                    <h4>Science</h4>
                                </div>
                                <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                                    <button onclick="location.href='../pages/science_space.php'" type="button" class="btn btn-outline-success rounded float-sm-end me-3">Science</button>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush mt-3">
                            </ul>
                        </div>
                    </div>
                </section>
                <div class="container my-4 d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
<?php
    }
?>
