<?php
    function draw_aboutus() {
?>
<div id="about-us-info" class="row container m-auto mt-5">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container d-flex justify-content-center" style="">
                    <h2 style="font-weight: bolder;">Discussly</h2>
                </div>
                <div class="container d-flex justify-content-center text-center w-75">
                    <p>This website is designed and intended to create a community of collaborative questions and answers, in order to promote knowledge accessibility for any person. In this environment, users can educate themselves about any specific area of expertise in the STEM field.</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container d-flex justify-content-center" style="">
                    <h2 style="font-weight: bolder;">The Team</h2>
                </div>
                <div class="container d-flex justify-content-center text-center w-75">
                    <p>We are a group of 3rd year students of Informatics and Computing Engineering at Faculdade de Engenharia da Universidade do Porto.</p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container d-flex justify-content-center" style="">
                    <h2 style="font-weight: bolder;">The Mission</h2>
                </div>
                <div class="container d-flex justify-content-center text-center w-75">
                    <p>This project is being done within the scope of LBAW (Laboratório de Bases de Dados e Aplicações Web) with the intent of developing a fully functional Q&A website where users can answer and get questions answered about anything related to the STEM fields.</p>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="prev">
                <span class="material-icons" style="color: #fd5d22; font-size: 5vw;">
                keyboard_arrow_left
                </span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="next">
                <span class="material-icons" style="color: #fd5d22; font-size: 5vw;">
                keyboard_arrow_right
                </span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>
</div>

<div class="container marketing my-5">
    <div class="row">
        <div class="col-lg-3 d-flex flex-column align-items-center text-center" style="">
            <img src="../images/joao.png" class="rounded-circle card-img-top img-fluid ms-1 mt-2" alt="..." style="width:12em; height: 12em;">
            <div class="identification mt-3">
                <h3 style="font-weight: bolder;">João Pinto</h3>
                <p class="text-muted">up201806667</p>
            </div>
        </div>
        <div class="col-lg-3 d-flex flex-column align-items-center text-center" style="">
            <img src="../images/jose.png" class="rounded-circle rounded-circlecard-img-top img-fluid ms-1 mt-2" alt="..." style="width:12em; height: 12em;">
            <div class="identification mt-3">
                <h3 style="font-weight: bolder;">José Maçães</h3>
                <p class="text-muted">up201806622</p>
            </div>
        </div>
        <div class="col-lg-3 d-flex flex-column align-items-center text-center" style="">
            <img src="../images/miguel.png" class="rounded-circle card-img-top img-fluid ms-1 mt-2" alt="..." style="width:12em; height: 12em;">
            <div class="identification mt-3">
                <h3 style="font-weight: bolder;">Miguel Silva</h3>
                <p class="text-muted">up201806388</p>
            </div>
        </div>
        <div class="col-lg-3 d-flex flex-column align-items-center text-center" style="">
            <img src="../images/tomas.png" class="rounded-circle card-img-top img-fluid ms-1 mt-2" alt="..." style="width:12em; height: 12em;">
            <div class="identification mt-3">
                <h3 style="font-weight: bolder;">Tomás Mendes</h3>
                <p class="text-muted">up201806522</p>
            </div>
        </div>
    </div>
</div>

<?php
    }
?>
