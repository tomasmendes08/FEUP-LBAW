<?php
    function draw_contactus_question() { ?>
    <div class="container my-5">
        <div class="row" style="">
            <div class="question-feed-header d-flex justify-content-center align-items-center">
                <h2 class="mb-0" style="font-weight:bolder;">Contact Us</h2>
            </div>
        </div>
        <div class="info container mt-3 py-4" >
            
            <div class="">
                <label for="emailAddress" class="form-label" style="color: #fd5d22;">Email*</label>
                <input type="text" class="form-control ms-2 w-75" id="emailAddress" placeholder="johndoe@example.com" required>
            </div>
            <div class=" mt-4">
                <label for="contactTitle" class="form-label" style="color: #fd5d22;">Message Subject*</label>
                <input type="text" class="form-control ms-2 w-75" id="questionTitle" placeholder="Ex.: I love your interface!" required>
            </div>
            <div class=" mt-4">
                <label for="question-text-area" class="form-label" style="color: #fd5d22;">Message Body*</label>
                
                <textarea id="question-text-area" class="form-control ms-2" placeholder="Message text..." rows="6" aria-describedby="questionBodyHelp" required></textarea>
                
                <div id="questionBodyHelp" class="form-text text-muted" style="font-weight:bolder;">Max number of characters: 2000</div>
            </div>
            <div class="container mt-5 ms-2 d-flex justify-content-center" >
                <button onclick="location.href='../pages/homepage.php'" style="background-color: #fd5d22; border-color: #fd5d22; color:white;" class="btn btn-contact-us" type="button">Submit</button>
            </div>
        </div>
    </div>

<?php }


   
?>