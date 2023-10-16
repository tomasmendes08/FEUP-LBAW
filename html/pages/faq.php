<?php 
    include_once('../templates/tpl_common.php');
    include_once("../templates/tpl_faq.php");
    draw_navbar_regular_user();
?>
    <div class="container">
        <?=draw_faq();?>

    </div>
<?php
    draw_footer();
    
?>