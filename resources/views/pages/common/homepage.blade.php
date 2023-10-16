@extends('layouts.app')

@section('title', 'Discussly')

@section('content')
<section class="homepage-header container-1 d-flex justify-content-center homepage-top vertical-align-middle" style="">
    <div class="px-lg-5 px-md-2 px-4 container h-25">
            <div class="homepage-top-slogan-div mt-3 d-flex" style="color:#f8f9fa;">
                <h2 class="homepage-top-slogan">With doubts? Write a question!</h2>
                @guest
                    <span class="material-icons ms-1 add-question-icon" onclick="location.href='/signup'">
                        add_box
                    </span>
                @endguest
                @auth
                    <span class="material-icons ms-1 add-question-icon" onclick="location.href='/add_question'">
                        add_box
                    </span>
                @endauth
            </div>
    </div>
</section>
<section class="about-us container d-flex flex-md-row flex-column align-items-center mt-5 mb-3" style="">
        <div class="col-9 offset-md-0 col-md-6">
            <img src="images/ourteam.jpg" class="img-fluid rounded" alt="...">
        </div>
        <div class="col-12 col-md-6 d-flex flex-column justify-content-center" style="text-align:center;">
            <div class="row mt-4">
                <h2 class="fw-bold">Discussly Team</h2>
            </div>
            <div class="row mt-4 d-flex justify-content-center">
                <button onclick="location.href='/about'" type="button" class="btn btn-outline-dark col-4" style="">
                    About Us
                </button>
            </div>
        </div>
</section>
<br>
<hr class="container col-11" style="border: 1px solid black; border-radius: 2px;">
<section class="spaces-section container mt-5 mb-4" >
    <div class="row" style="text-align:center;">
        <h2 class="fw-bold">Spaces</h2>
    </div>
    <div class="row">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container d-flex justify-content-center" style="">
                        <img src="../images/science.png" id="science-logo" class="card-img-top mt-2" alt="...">
                    </div>
                    <div class="container d-flex justify-content-center">
                        <button type="button" onclick="location.href='/science'" class="btn btn-outline-success mt-2" style="">Check Science</button>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container d-flex justify-content-center" style="">
                        <img src="../images/tech.png" id="tech-logo" class="card-img-top mt-2" alt="...">
                    </div>
                    <div class="container d-flex justify-content-center">
                        <button type="button" onclick="location.href='/technology'" class="btn btn-outline-primary mt-2" style="">Check Technology</button>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container d-flex justify-content-center" style="">
                        <img src="../images/engine.png" id="engineering-logo" class="card-img-top" alt="...">
                    </div>
                    <div class="container d-flex justify-content-center">
                        <button type="button" onclick="location.href='/engineering'" class="engine btn btn-outline mt-2" style="">Check Engineering</button>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container d-flex justify-content-center" style="">
                        <img src="../images/maths.png" id="maths-logo" class="card-img-top mt-2" alt="...">
                    </div>
                    <div class="container d-flex justify-content-center">
                        <button type="button" onclick="location.href='/maths'" class="btn btn-outline-danger mt-3" style="">Check Maths</button>
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
<hr class="container col-11" style="border: 1px solid black; border-radius: 2px;">
<section class="question-feed-homepage container mt-5 mb-4">
    <div class="row" style="text-align:center;">
        <h2 class="fw-bold">Question Feed</h2>
    </div>
    <div class="question-feed-questions questions">
        @foreach ($questions as $question)
        <div class="my-5">
            @include('partials.cards.question_card', ['question' => $question])
        </div>
        @endforeach
    </div>
    <div class="container justify-content-center read-more-question-feed-div my-5" style="display: flex;">
        <div class="question-feed-question-page" data-id=1></div>
        <button type="button" class="btn btn-dark rounded d-flex justify-content-center" id="read-more-question-feed">
            <span class="material-icons me-1">
                add_box
            </span>
            Read More
        </button>
    </div>
    <div class="justify-content-center loading-question-feed-div my-5" style="display: none;">
        <div class="spinner-border" role="status">
        </div>
    </div>
</section>
@endsection

