<?php
    function draw_navbar() {
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href='https://fonts.googleapis.com/css?family=Basic' rel='stylesheet'>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    </head>
    <body style="font-family: 'Basic';">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
            <div class="container">
                <a class="navbar-brand d-flex justify-content-center" href="../pages/homepage.php" style="font-weight: bolder; font-size: xx-large;">Discussly</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="ps-3 collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex my-2" action="../pages/search.php">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" style="border-top-right-radius: 0%; border-bottom-right-radius: 0%;">
                        <button id="search_btn" class="btn btn-outline-light" type="submit" style="border-color: #fd5d22; background-color:#fd5d22; border-width: 0.10rem; border-top-left-radius: 0%; border-bottom-left-radius: 0%;">
                            <span class="material-icons d-flex justify-content-center">
                                search
                            </span>
                        </button>
                    </form>
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item col-xl-4 ms-xl-5 col-3">
                        <a class="nav-link" style="color: white;" href="../pages/science_space.php">Science</a>
                        </li>
                        <li class="nav-item col-xl-5 col-4">
                        <a class="nav-link" style="color: white;" href="../pages/tech_space.php">Technology</a>
                        </li>
                        <li class="nav-item col-xl-5 col-4">
                        <a class="nav-link" style="color: white;" href="../pages/engineering_space.php">Engineering</a>
                        </li>
                        <li class="nav-item col-xl-4 col-3">
                        <a class="nav-link" style="color: white;" href="../pages/maths_space.php">Maths</a>
                        </li>  
                    </ul>
                    <button type="button" id="login_btn" class="btn btn-outline me-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap" style="color: #fd5d22; border-color: #fd5d22; background-color: #212529;">Login</button>
                    
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" id="modal_login" style="">
                            <div class="modal-content">
                                <div class="modal-header" style="">
                                    <h3 class="modal-title" id="exampleModalLabel" style="">Login</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                    <div class="mb-3">
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                                </svg>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Enter your username or email" aria-label="Username" aria-describedby="addon-wrapping">                                    </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="input-group flex-nowrap">
                                            <span class="input-group-text" id="addon-wrapping">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                                                </svg>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Enter your password" aria-label="Password" aria-describedby="addon-wrapping">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center links" style="float:right; color: #212529;">
                                        <a href="../pages/recover_password.php" style="color: #fd5d22;">Forgot your password?</a>
                                    </div>
                                    
                                    </form>
                                </div>
                                <div class="custom-control custom-checkbox ms-3 mb-4" style="float:left;">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="button" id="login_email" class="btn btn-primary w-50" style="background-color: #212529; border-color: #212529;">Login</button>
                                </div>
                                <div class="row">
                                    <div class="col"><hr></div>
                                    <div class="col-auto">OR</div>
                                    <div class="col"><hr></div>
                                </div>
                                <div class="row mb-3"></div>
                                <div class="row mb-3 d-flex justify-content-center">
                                    <button type="button" id="login_google" class="btn btn-lg btn-outline-primary w-75 fs-5" style="color: #212529; border-color: #212529;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-google mb-1 me-1" viewBox="0 0 16 16">
                                        <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                                        </svg> Login with Google
                                    </button>
                                </div>
                                <div class="mt-2 mb-3">
                                    <div class="d-flex justify-content-center links">
                                        Don't have an account? &nbsp;<a href="../pages/signup.php" class="ml-4" style="color: #fd5d22;">Sign Up</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button onclick="location.href='../pages/signup.php'" class="btn btn-primary me-3" type="button" style="background-color: #fd5d22; border-color: #fd5d22;">Sign Up</button>
                </div>
            </div>
        </nav>
<?php
    }
?>

<?php
    function draw_navbar_regular_user() {
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href='https://fonts.googleapis.com/css?family=Basic' rel='stylesheet'>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    </head>
    <body style="font-family:'Basic';">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
        <div class="container">
            <a class="navbar-brand d-flex justify-content-center" href="../pages/homepage.php" style="font-weight: bolder; font-size: xx-large;">Discussly</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="ps-3 collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex" action="../pages/search.php">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" style="border-top-right-radius: 0%; border-bottom-right-radius: 0%;">
                    <button onclick="location.href='../pages/search.php'" id="search_btn" class="btn btn-outline-light" type="submit" style="border-color: #fd5d22; background-color:#fd5d22; border-width: 0.10rem; border-top-left-radius: 0%; border-bottom-left-radius: 0%;">
                        <span class="material-icons d-flex justify-content-center">
                            search
                        </span>
                    </button>
                </form>
                <ul class="navbar-nav me-auto">
                    <li class="nav-item col-xl-4 ms-xl-5 col-3">
                    <a class="nav-link" style="color: white;" href="../pages/science_space.php">Science</a>
                    </li>
                    <li class="nav-item col-xl-5 col-4">
                    <a class="nav-link" style="color: white;" href="../pages/tech_space.php">Technology</a>
                    </li>
                    <li class="nav-item col-xl-5 col-4">
                    <a class="nav-link" style="color: white;" href="../pages/engineering_space.php">Engineering</a>
                    </li>
                    <li class="nav-item col-xl-4 col-3">
                    <a class="nav-link" style="color: white;" href="../pages/maths_space.php">Maths</a>
                    </li>  
                </ul>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle me-2" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../images/bradpitt.jpg" class="rounded-circle" width="40">
                        bradpitt01
                    </button>
                    <ul class="dropdown-menu dropdown-menu-lg-end me-2" style="" aria-labelledby="dropdownMenuButton2">
                    <li><a class="dropdown-item d-flex" href="../pages/profile.php">
                    <span class="material-icons me-2">
                    person
                    </span>
                    Profile</a></li>
                    <li><a class="dropdown-item d-flex" href="../pages/administrator.php">
                    <span class="material-icons me-2">
                    admin_panel_settings
                    </span>
                    Administrate</a></li>
                    <li><a class="dropdown-item d-flex ms-1" href="#">
                        <span class="material-icons me-1">
                        logout
                        </span>
                        Logout
                        </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
<?php    
    }

    function draw_footer() {
?>    
        <footer class="pt-md-5 border-top bg-light mb-4">
            <div class="row container m-auto mt-3">
                <div class="col-6 col-md">
                    <a class="link-secondary text-decoration-none" href="../pages/homepage.php" style="font-weight: bolder; font-size: x-large; color: #212529;">Discussly</a>
                    <small class="d-block mb-3 text-muted">&copy; 2021</small>
                </div>
                <div class="col-6 col-md">
                    <h5>Spaces</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="link-secondary text-decoration-none" href="../pages/science_space.php">Science</a></li>
                        <li><a class="link-secondary text-decoration-none" href="../pages/tech_space.php">Technology</a></li>
                        <li><a class="link-secondary text-decoration-none" href="../pages/engineering_space.php">Engineering</a></li>
                        <li><a class="link-secondary text-decoration-none" href="../pages/maths_space.php">Maths</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Resources</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="link-secondary text-decoration-none" href="../pages/signup.php">Register</a></li>
                        <li><a class="link-secondary text-decoration-none" href="../pages/profile.php">Profile</a></li>
                        <li><a class="link-secondary text-decoration-none" href="../pages/recover_password.php">Recover Password</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>About</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="link-secondary text-decoration-none" href="../pages/about_us.php">About Us</a></li>
                        <li><a class="link-secondary text-decoration-none" href="../pages/contact_us.php">Contact Us</a></li>
                        <li><a class="link-secondary text-decoration-none" href="../pages/faq.php">FAQ</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </body>
    </html>
<?php    
    }
?>
