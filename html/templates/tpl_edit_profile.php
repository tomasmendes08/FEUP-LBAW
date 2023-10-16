<?php
    function draw_edit_profile(){
?>

<section class="edit-profile-section bg-light">
    <div class="edit-profile-cont container-md px-md-0 px-3 mt-5 mb-5 d-flex justify-content-center">
        <div class="edit-profile col-12">
            <div class="edit-profile-header p-3 py-5"> 
            </div>
            
            <span class="material-icons icon-edit-header">
            add_a_photo
            </span>
        
            <div class="edit-profile-content cont px-4 d-md-flex">                                                                                                                                     
                <div class="edit-profile-content-left mb-4 col-md-4 col-12 d-flex flex-column align-items-center"> 
                    <img src="../images/bradpitt.jpg" class="rounded-circle img-thumbnail" />
                    <span class="material-icons icon-edit-pic">
                    add_a_photo
                    </span>
                    <div class="profile-names text-center">
                        <h4 class="name" style="font-weight:bolder;">Brad Pitt
                        </h4>
                        <h5 class="username" style="color: #ff8a60;">@bradpitt01</h5>
                        
                    </div>
                    
                    <div class="profile-description mt-3">
                        <div class="profile-description-header d-flex justify-content-center"><h5 style="font-weight:bolder;">About Me</h5></div>
                        <textarea class="form-control mt-2" rows="8" cols="38" placeholder="">Hi guys! I'm a tech enthusiast, so I really like to help anyone that needs advice inside the techonology space. I'm also a cinema addicted and my favourite film is "The Wizard of Oz". Besides that, music plays a key role on my daily life!                              insta:tylerdurden01</textarea>
                        
                    </div>
                    <div class="profile-spaces mt-3">
                        <div class="profile-spaces-header d-flex justify-content-center">
                            <h5 style="font-weight: bolder;">Spaces</h5>
                        </div>
                        <div class="profile-spaces-selected mt-3 d-flex flex-column align-items-center">
                            <button type="button" class="btn btn-outline-success rounded ">Science</button>
                            <button type="button" class="btn btn-outline-primary rounded mt-3 ">Technology</button>
                            
                        </div>
                    </div>
                </div>
                <hr class="mb-5">
                <div class="edit-profile-content-right col-md-8 col-12 mt-md-4">
                    <div class="edit-profile-content-right-header">
                        <h3 class="d-flex justify-content-center" style="font-weight:bolder;">Personal Details</h3>
                    </div>
                    <div class="row d-flex justify-content-center ms-4 mt-4">   
                        <div class="edit-profile-name col-sm-5 col-12 me-sm-5">
                            <label for="name1" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name1" aria-describedby="name1" value="Brad Pitt">    
                        </div>
                        <div class="edit-profile-username col-sm-5 col-12 mt-sm-0 mt-4">
                            <label for="username1" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username1" aria-describedby="username1" value="bradpitt01">    
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center ms-4 mt-4">   
                        <div class="edit-profile-name col-sm-5 col-12 me-sm-5">
                            <label for="email1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email1" aria-describedby="email1" value="bradpitt123@gmail.com">    
                        </div>
                        <div class="edit-profile-username col-sm-5 col-12 mt-sm-0 mt-4">
                            <label for="city1" class="form-label">City</label>
                            <input type="text" class="form-control" id="city1" aria-describedby="city1" value="Porto">    
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center ms-4 mt-4">   
                        <div class="edit-profile-name col-sm-5 col-12 me-sm-5 ">
                            <label for="phone1" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone1" aria-describedby="phone1" value="912345678">    
                        </div>
                        <div class="edit-profile-username col-sm-5 col-12 mt-sm-0 mt-4">
                            <label for="birthday1" class="form-label">Birthday</label>
                            <input type="date" class="form-control" id="birthday1" aria-describedby="birthday1" value="1978-01-08">    
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center ms-4 mt-4">   
                        <div class="edit-profile-name col-sm-5 col-12 me-sm-5">
                            <label for="password1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password1" aria-describedby="password1" value="bradpitt123">    
                        </div>
                        <div class="edit-profile-username col-sm-5 col-12 mt-sm-0 mt-4">
                            <label for="newpassword1" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="newpassword1" aria-describedby="newpassword1" value="">    
                        </div>
                    </div>
                    <div class="button-save-changes d-flex justify-content-end mt-5 me-4">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-update-profile" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Update
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        Do you really want to save your changes?
                                    </div>
                                    <div class="modal-div-buttons d-flex justify-content-end me-4 my-3">
                                        <button type="button" class="btn btn-outline-dark close-changes-button me-3" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-dark save-changes-button ">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="delete-account d-flex justify-content-end me-4" style="margin-top: 90px;">
                        <button type="button" class="btn btn rounded " style="background-color: red; color:white;">Delete Account</button> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    }
?>