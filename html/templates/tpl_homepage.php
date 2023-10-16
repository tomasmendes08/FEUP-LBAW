<?php
    function draw_homepage(){
?>
    <section class="container-1 d-flex justify-content-center homepage-top vertical-align-middle" style="">
        <div class="px-lg-5 px-md-2 px-4 container h-25">
                <div class="hom" style="color:#f8f9fa;">
                    <h1 class="homepage-top-discussly" style="">Discussly</h1>
                </div>
            
                <div class="homepage-top-slogan-div mt-3 d-flex" style="color:#f8f9fa;">
                    <h3 class="homepage-top-slogan">With doubts? Write a question!</h3>
                    <span class="material-icons ms-1 add-question-icon" onclick="location.href='../pages/add_question.php'">
                        add_box
                    </span>
                </div>
        </div>
    </section>
    <section class="about-us container d-flex flex-md-row flex-column align-items-center mt-5 mb-3" style="">
            <div class="col-9 offset-md-0 col-md-6">
                <img src="../images/ourteam.jpg" class="img-fluid rounded" alt="...">
            </div>
            <div class="col-12 col-md-6 d-flex flex-column justify-content-center" style="text-align:center;">
                <div class="row mt-4">
                    <h2>Discussly Team</h2>
                </div>
                <div class="row mt-4 d-flex justify-content-center">
                    <button onclick="location.href='../pages/about_us.php'" type="button" class="btn btn-outline-dark col-4" style="">
                        About Us
                    </button>
                </div>
            </div>
    </section>
    <br>
    <hr class="container col-10">
    <section class="spaces-section container mt-4 mb-3" >
        <div class="row" style="text-align:center;">
            <h2>Spaces</h2>
        </div>
        <div class="row">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container d-flex justify-content-center" style="">
                            <img src="../images/science.png" id="science-logo" class="card-img-top mt-2" alt="...">
                        </div>
                        <div class="container d-flex justify-content-center">
                            <button type="button" onclick="location.href='../pages/science_space.php'" class="btn btn-outline-success mt-2" style="">Check Science</button>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container d-flex justify-content-center" style="">
                            <img src="../images/tech.png" id="tech-logo" class="card-img-top mt-2" alt="...">
                        </div>
                        <div class="container d-flex justify-content-center">
                            <button type="button" onclick="location.href='../pages/tech_space.php'" class="btn btn-outline-primary mt-2" style="">Check Technology</button>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container d-flex justify-content-center" style="">
                            <img src="../images/engine.png" id="engineering-logo" class="card-img-top" alt="...">
                        </div>
                        <div class="container d-flex justify-content-center">
                            <button type="button" onclick="location.href='../pages/engineering_space.php'" class="engine btn btn-outline mt-2" style="">Check Engineering</button>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container d-flex justify-content-center" style="">
                            <img src="../images/maths.png" id="maths-logo" class="card-img-top mt-2" alt="...">
                        </div>
                        <div class="container d-flex justify-content-center">
                            <button type="button" onclick="location.href='../pages/maths_space.php'" class="btn btn-outline-danger mt-3" style="">Check Maths</button>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="prev">
                    <span class="material-icons" style="color:#212529;font-size: 5vw;">
                    keyboard_arrow_left
                    </span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="next">
                    <span class="material-icons" style="color:#212529;font-size: 5vw;">
                    keyboard_arrow_right
                    </span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <br>
    <hr class="container col-10">
    <section class="question-feed container mt-4 mb-3">
        <div class="row" style="text-align:center;">
            <h2>Question Feed</h2>
        </div>
        <div class="col-12 mt-4 px-1">
            <div class="card mb-4 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                    <div class="username mt-2 d-flex align-items-center col-6">
                        <img src="../images/tomcruise.jpg" class="rounded-circle me-2" width="60">
                        <h4>tomcruise17</h4>
                    </div>
                    <div class="question-space col-sm-6 col-12 mt-3 d-flex justify-content-sm-end justify-content-start">
                        <button type="button" onclick="location.href='../pages/science_space.php'" class="btn btn-outline-success rounded me-3">Science</button>
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
        
        <div class="col-12 px-1" style="margin-top: 80px;">
            <div class="card mb-4 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                    <div class="username mt-2 d-flex align-items-center col-6">
                        <img src="../images/davidlynch.jpg" class="rounded-circle me-2" width="60">
                        <h4>davidlynch12</h4>
                    </div>
                    <div class="question-space col-6 mt-3 d-flex justify-content-sm-end justify-content-start">
                        <button type="button" onclick="location.href='../pages/tech_space.php'" class="btn btn-outline-primary rounded float-sm-end me-3">Technology</button>
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
        <div class="col-12 px-1" style="margin-top: 80px;">
            <div class="card mb-4 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                    <div class="username mt-2 d-flex align-items-center col-6">
                        <img src="../images/scarlett.jpg" class="rounded-circle me-2" width="60">
                        <h4>scarlett21</h4>
                    </div>
                    <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                        <button type="button" onclick="location.href='../pages/engine_space.php'" class="engine btn btn-outline-primary rounded float-sm-end me-3">Engineering</button>
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
        <div class="col-12 px-1" style="margin-top: 80px;">
            <div class="card mb-4 " style="border: solid 2px #212529; box-shadow: 0.4em 0.4em 0.4em 0em;">
                <div class="question-header ms-3 d-grid d-sm-flex" style="color: grey;">
                    <div class="username mt-2 d-flex align-items-center col-6">
                        <img src="../images/alpacino.jpg" class="rounded-circle me-2" width="60">
                        <h4>alpacino89</h4>
                    </div>
                    <div class="question-space col-6 mt-3 d-flex justify-content-start justify-content-sm-end">
                        <button type="button" onclick="location.href='../pages/maths_space.php'" class="btn btn-outline-danger rounded float-sm-end me-3">Maths</button>
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
        <div class="container d-flex justify-content-center flex-direction-column my-5" style="">
            <button type="button" class="btn read-more rounded d-flex justify-content-center">
                <span class="material-icons me-1">
                    add_box
                </span>
                Read More
            </button>
        </div>
    </section>
<?php
    }
?>
