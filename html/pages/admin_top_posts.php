<?php
    include_once('../templates/tpl_common.php');
    include_once("../templates/tpl_space_page.php");
    include_once("../templates/tpl_admin.php");
    
    draw_navbar_regular_user();
?>
<div class="container mw-2"> <?php

    draw_admin_top_posts_title();
    draw_admin_top_posts_feed();
?> </div>
<?php
    draw_footer();
?>