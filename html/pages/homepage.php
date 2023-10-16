<?php 
    include_once('../templates/tpl_common.php');
    include_once("../templates/tpl_homepage.php");
    
    //draw_navbar_regular_user();
    //draw_navbar_test();
    draw_navbar();
    ?>
    <div class="container-xl px-0">
    <?php
    draw_homepage();?>
    </div>
    <?php
    draw_footer();

?>