

<div id="wcfusion_main">

    <?php include WCFUSION_PATH . "backend/templates/views/module_list.php"; ?>
    <?php include WCFUSION_PATH . "backend/templates/views/module_admin.php"; ?>

</div>


<script type="text/javascript">
    jQuery(document).ready(function($){
        'use strict';

        const host = "<?php echo WCFUSION_URL; ?>";
        wcfusion_plugin_init(host);
    });

</script>