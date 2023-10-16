<?php 
    include_once('../templates/tpl_common.php');
    include_once("../templates/tpl_about_us.php");
    draw_navbar_regular_user();
?>
    <div class="container">

        <?=draw_aboutus();?>

    </div>
    <?php
    draw_footer();
?>