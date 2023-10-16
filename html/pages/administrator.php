<?php
    include_once('../templates/tpl_common.php');
    include_once('../templates/tpl_profile.php');
    include_once('../templates/tpl_space_page.php');
    include_once('../templates/tpl_admin.php');
    draw_navbar_regular_user();
?>
<div class="container mw-2">
    <h1 class="mx-auto my-5 text-center">Administration Area</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light col-lg">
        <div class="container">
            <ul class="nav nav-pills row mx-auto" id="AdminAreaNavbar">
                <li class="nav-item col-auto">
                    <button class="button-tab-filter nav-link active" id="pills-award-tab" data-bs-toggle="pill" data-bs-target="#pills-award" type="button" role="tab" aria-controls="pills-award" aria-selected="true">Award</button>
                </li>
                <li class="nav-item col-auto">
                    <button class="button-tab-filter nav-link" id="pills-report-tab" data-bs-toggle="pill" data-bs-target="#pills-report" type="button" role="tab" aria-controls="pills-report" aria-selected="false">Report</button>
                </li>
            </ul>
        </div>
    </nav>
    
        
    <div class="container my-3 tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-award" role="tabpanel" aria-labelledby="pills-award-tab">
            <?php
                draw_user_admin_award_card();
                draw_user_admin_award_card();
                draw_user_admin_award_card();
                draw_user_admin_award_card();
                draw_user_admin_award_card();
                draw_user_admin_award_card();
            ?>                
        </div>

        <div class="tab-pane fade" id="pills-report" role="tabpanel" aria-labelledby="pills-report-tab">
            <div class="dropdown col-12 my-3">
                <button class="btn btn-light dropdown-toggle col-12 mt-3 border-dark" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Item type
                </button>

               <ul class="dropdown-menu nav nav-pills col-12" id="AdminAreaNavbar2" aria-labelledby="dropdownMenuButton1">
                    <li class="nav-item mx-auto">
                        <button class="dropdown-item button-tab-filter nav-link active" id="pills-users-tab" data-bs-toggle="pill" data-bs-target="#pills-users" type="button" role="tab" aria-controls="pills-users" aria-selected="true">Users</button>
                    </li>
                    <li class="nav-item mx-auto">
                        <button class="dropdown-item button-tab-filter nav-link" id="pills-questions-tab" data-bs-toggle="pill" data-bs-target="#pills-questions" type="button" role="tab" aria-controls="pills-questions" aria-selected="false">Questions</button>
                    </li>
                    <li class="nav-item mx-auto">
                        <button class="dropdown-item button-tab-filter nav-link" id="pills-answers-tab" data-bs-toggle="pill" data-bs-target="#pills-answers" type="button" role="tab" aria-controls="pills-answers" aria-selected="false">Answers</button>
                    </li>
                    <li class="nav-item mx-auto">
                        <button class="dropdown-item button-tab-filter nav-link" id="pills-comments-tab" data-bs-toggle="pill" data-bs-target="#pills-comments" type="button" role="tab" aria-controls="pills-comments" aria-selected="false">Comments</button>
                    </li>
                </ul>
            </div>

            <div class="d-flex">
                <div class="container px-0 tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-users" role="tabpanel" aria-labelledby="pills-users-tab">
                        <?php
                            draw_user_admin_report_card();
                            draw_user_admin_report_card();
                            draw_user_admin_report_card();
                            draw_user_admin_report_card();
                            draw_user_admin_report_card();
                            draw_user_admin_report_card();
                        ?>  
                    </div>

                    <div class="tab-pane fade" id="pills-questions" role="tabpanel" aria-labelledby="pills-questions-tab">
                        <?php
                            draw_question_card_report("../images/tomcruise.jpg", "Hello, why is biology considered science?", "tomcruise_123", "321", "3", "12:00 - 11/03/2021", Space::$SCIENCE);
                            draw_question_card_report("../images/tomcruise.jpg", "Hello, why is biology considered science?", "tomcruise_123", "321", "3", "12:00 - 11/03/2021", Space::$SCIENCE);
                            draw_question_card_report("../images/tomcruise.jpg", "Hello, why is biology considered science?", "tomcruise_123", "321", "3", "12:00 - 11/03/2021", Space::$SCIENCE);
                            draw_question_card_report("../images/tomcruise.jpg", "Hello, why is biology considered science?", "tomcruise_123", "321", "3", "12:00 - 11/03/2021", Space::$SCIENCE);
                            draw_question_card_report("../images/tomcruise.jpg", "Hello, why is biology considered science?", "tomcruise_123", "321", "3", "12:00 - 11/03/2021", Space::$SCIENCE);
                            draw_question_card_report("../images/tomcruise.jpg", "Hello, why is biology considered science?", "tomcruise_123", "321", "3", "12:00 - 11/03/2021", Space::$SCIENCE);
                        ?>  
                    </div>

                    <div class="tab-pane fade" id="pills-answers" role="tabpanel" aria-labelledby="pills-answers-tab">
                        <?php
                            draw_admin_answer_card();
                            draw_admin_answer_card();
                            draw_admin_answer_card();
                            draw_admin_answer_card();
                        ?>
                    </div>

                    <div class="tab-pane fade" id="pills-comments" role="tabpanel" aria-labelledby="pills-comments-tab">
                        <?php
                            draw_admin_comment_card();                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    draw_footer();
?>
