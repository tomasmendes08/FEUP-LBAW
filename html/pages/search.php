<?php 
    include_once('../templates/tpl_common.php');
    include_once("../templates/tpl_search.php");
    draw_navbar_regular_user();
?>
<div class="container">
    <?php
        draw_search();
    ?>
</div>
<?php
    draw_footer();
?>