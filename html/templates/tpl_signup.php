<?php
    function draw_signup() {
?>
    <div class="signup-header d-flex justify-content-center ms-1">
        <h1 class="title" style="font-weight:bolder;">
            Sign Up
        </h1>
    </div>
    <div class="container signupform my-4">
        <form>
            <div class="signup-profile-pic mb-4 d-flex flex-column align-items-center justify-content-center">
                <img src="../images/default.png" class="rounded-circle img-thumbnail" />
                <div class="mb-4 mt-3">
                    <input type="file" id="register-profile-pic" class="form-control-file" hidden>
                    <label for="register-profile-pic" class="button-profile-pic-upload btn btn-dark d-flex">
                    Profile Pic
                    <span class="material-icons ms-2" style="font-size: 23px;">
                    add_a_photo
                    </span>
                    </label>
                </div>
            </div>
            <div class="mb-4">
                <label for="exampleInputUsername1" class="form-label" style="color: #fd5d22;">Username*</label>
                <input type="text" class="form-control ms-1" placeholder="Please enter your username" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="usernameHelpBlock" class="form-text mt-1 text-muted">
                    Your username must have at most 17 characters.
                </div>
            </div>
            <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label" style="color: #fd5d22;">Email*</label>
                <input type="email" class="form-control ms-1" placeholder="Please enter your email" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label" style="color: #fd5d22;">Password*</label>
                <input type="password" class="form-control ms-1" id="exampleInputPassword1" placeholder="Enter your password">
                <div id="passwordHelpBlock" class="form-text mt-1 text-muted">
                    Your password must be 8-20 characters long.
                </div>
            </div>
            <div class="mb-4">
                <label for="exampleInputPassword2" class="form-label" style="color: #fd5d22;">Confirm Password*</label>
                <input type="password" class="form-control ms-1" id="exampleInputPassword2" placeholder="Confirm password">
            </div>
            <div class="mb-4">
                <label for="sentence2" class="form-label" style="color: #fd5d22;">Favourite Spaces</label>
                <div class="form-check">
                    <label class="form-check-label" for="flexCheckDefault">
                        Science
                    </label>
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                </div>
                <div class="form-check mt-2">
                    <label class="form-check-label" for="flexCheckChecked">
                        Technology
                    </label>
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                </div>
                <div class="form-check mt-2">
                    <label class="form-check-label" for="flexCheckDefault">
                        Engineering
                    </label>
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                </div>
                <div class="form-check mt-2">
                    <label class="form-check-label" for="flexCheckDefault">
                        Maths
                    </label>
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                </div>
                <div class="my-3">
                    <label for="exampleFormControlTextarea1" class="form-label" style="color: #fd5d22;">Description</label>
                    <textarea class="form-control ms-1" placeholder="Small description of yourself" id="exampleFormControlTextarea1" rows="6"></textarea>
                    <div id="descriptionHelpBlock" class="form-text mt-1 text-muted">
                    Your description must have at most 70 words.
                    </div>
                </div>
            </div>
            <div class="mb-4 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Receive email notifications about our site</label>
            </div>
            <button id="sign-up-submit" type="submit" class="btn btn-primary" style="background-color: #fd5d22; border-color: #fd5d22;">Sign Up</button>
        </form>
    </div>
<?php
    }
?>