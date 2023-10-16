<?php
    function draw_recover_password() {
?>
    <section class="recover-password mt-5">
        <div class="recover-password-cont container">
            <div class="recover-password-header d-flex align-items-center">
                <h2 style="font-weight: bolder;">Recover Password</h2>
                <span class="material-icons ms-2">
                    lock_fill
                </span>
            </div>
            <div class="recover-password-body mt-4">
                <div class="mb-3">
                    <label for="question-body-area" class="form-label" style="color:#fd5d22;">Email Address</label>
                    <input type="email" class="form-control" placeholder="Enter your email" aria-label="Email" aria-describedby="addon-wrapping">
                </div>
                <div class="mb-3">
                    <label for="question-body-area" class="form-label" style="color:#fd5d22;">Confirm Email Address</label>
                    <input type="email" class="form-control" placeholder="Re-type your email" aria-label="Reemail" aria-describedby="addon-wrapping">
                </div>
            </div>
        </div>
        <div class="footer d-flex justify-content-center">
            <button type="button" id="login_email" class="btn btn-primary w-50" style="background-color: #212529; border-color: #212529;">Change Password</button>
        </div>
        <div class="row mt-3">
            <div class="col"><hr></div>
            <div class="col-auto">OR</div>
            <div class="col"><hr></div>
        </div>
        <div class="row my-3 d-flex justify-content-center">
            <button type="button" id="login_google" class="btn btn-lg btn-outline-primary w-75 fs-5" style="color: #212529; border-color: #212529;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-google mb-1 me-1" viewBox="0 0 16 16">
                <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                </svg> Login with Google
            </button>
        </div>
        <div class="my-2">
            <div class="d-flex justify-content-center links">
                Don't have an account? &nbsp;<a href="../pages/signup.php" class="ml-4" style="color: #fd5d22;">Sign Up</a>
            </div>
        </div>
    </section>
<?php
    }
?>