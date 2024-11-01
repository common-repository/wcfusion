

<div id="wcfusion_module_admin">

    <div class="wcfusion_module_admin_container">
        <?php
        foreach ($this->utils->modules_obj as $modules_obj) {
            $modules_obj->wcfusion_module_dashboard ();
        }
        ?>
    </div>

</div>



