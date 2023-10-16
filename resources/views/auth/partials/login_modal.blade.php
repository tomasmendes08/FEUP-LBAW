<form method="POST">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" id="modal_login" style="">
            <div class="modal-content">
                <div class="modal-header" style="">
                    <h3 class="modal-title fw-bold" id="exampleModalLabel" style="">Login</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                        </span>
                        <input type="text" class="form-control" id="login_username" placeholder="Enter your username" aria-label="Username" name="username" aria-describedby="addon-wrapping">                                    
                    </div>
                </div>
                <div class="mb-3">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                            </svg>
                        </span>
                        <input type="password" class="form-control" id="login_password" placeholder="Enter your password" aria-label="Password" name="password" aria-describedby="addon-wrapping">
                    </div>
                </div>
                <div class="login-error-message"></div>
                <div class="d-flex justify-content-center links mt-4" style="float:right; color: #212529;">
                    <a href="../pages/recover_password.php" style="color: #fd5d22;">Forgot your password?</a>
                </div>
                
            </div>
            <div class="custom-control custom-checkbox ms-4 mb-4" style="float:left;">
                <label class="custom-control-label" for="customControlInline">
                    <input type="checkbox" class="custom-control-input" id="customControlInline" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    Remember me
                </label>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" id="login_submit" class="btn btn-primary w-50" style="background-color: #212529; border-color: #212529;">Login</button>
            </div>
            <div class="row mt-2">
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
                    Don't have an account? &nbsp;<a href="/signup" class="ml-4" style="color: #fd5d22;">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>
<script src="{{asset('js/login_script.js')}}" defer></script>
