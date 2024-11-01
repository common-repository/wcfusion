<style>
    .wcfusion-url-coupon-admin-tab .wcfusion-tab-info h3{
        padding: 0 10px;
    }

    #wcfusion_url_coupon .wcfusion-url-coupon-options-group p.disabled {
        opacity: 0.5 !important;
    }
    .wcfusion-url-coupon-options-group .wcfusion_url_coupon_url_field  {
        position: relative;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }
    
    .wcfusion-copy-url-coupon-url {
        cursor: pointer;
        font-size: 14px;
        display: block;
        padding: 2px 5px 2px 5px;
        position: absolute;
        top: 5px;
        left: 627px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background: #ddd;
        font-weight: 500;
        right: auto;
    }
    .woocommerce_options_panel .wcfusion_url_coupon_url_field .description {
        margin: 5px 0 0 0px;
    }
    .wcfusion_url_coupon_url_field .description .text-success {
        color: green;
    }
    .woocommerce_options_panel .wcfusion_url_coupon_url_field .description {
    width: 100%;
    }
    .wcfusion_get_pro{
        color: #FF521D;
        font-size: 14px;
        font-weight: 500;
    }

</style>

<div id="wcfusion_url_coupon" class="panel woocommerce_options_panel hidden wcfusion-url-coupon-admin-tab">
    <div class="wcfusion-tab-info">
        <h3><?php _e ('wcFusion URL Coupon', 'wcfusion'); ?></h3>
        <p><?php _e ('Let your customers apply this coupon by visiting a URL. This coupon generates a unique coupon URL that can be used in all kind of scenarios (eg. email marketing, live chat support, blog links).', 'wcfusion'); ?></p>
    </div>

    <div class="wcfusion-url-coupon-options-group">
        <?php
        global $post;
        $coupon_id = $post->ID;

        $url_coupon_enable = get_post_meta ($coupon_id, 'wcfusion_url_coupon_enable', true) ? get_post_meta ($coupon_id, 'wcfusion_url_coupon_enable', true) : 'no';
        $url_coupon_force_apply = get_post_meta ($coupon_id, 'wcfusion_force_apply_url_coupon', true) ? get_post_meta ($coupon_id, 'wcfusion_force_apply_url_coupon', true) : 'no';

        // create custom fields for url coupon
        woocommerce_wp_checkbox (
            array(
                'id' => 'wcfusion_url_coupon_enable',
                'label' => __ ('Active Coupon URL', 'wcfusion'),
                'class' => 'wcfusion-url-coupon-toggle',
                'description' => __ ('When checked, enable coupon URL functionality for this coupon.', 'wcfusion'),
                'value' => $url_coupon_enable
            )
        );

        woocommerce_wp_checkbox (
            array(
                'id' => 'wcfusion_force_apply_url_coupon',
                'label' => __ ('Force Apply', 'wcfusion'),
                'class' => 'wcfusion-url-coupon-force-apply',
                'description' => __ ('When checked, remove all the other coupons and apply the current coupon on cart items.', 'wcfusion'),
                'value' => $url_coupon_force_apply,
            )
        );

        woocommerce_wp_text_input (
            array(
                'id' => 'wcfusion_url_coupon_url',
                'label' => __ ('Coupon URL', 'wcfusion'),
                'class' => 'wcfusion-url-coupon-url',
                'description' => __ ('<span class="wcfusion-desc-url-coupon-url">When visited, the coupon code will be applied to the visitor’s cart automatically.</span> <span class="wcfusion-copy-url-coupon-url">Copy URL</span>', 'wcfusion'),
                'type' => 'text',
                'data_type' => 'text',
                'value' => $this->wcfusion_get_coupon_url($coupon_id),
                'custom_attributes' => array('readonly' => true),
                //'desc_tip' => true,
            )
        );

        woocommerce_wp_text_input (
            array(
                'id' => 'wcfusion_url_coupon_override_code',
                'label' => __ ('Override URL Code <span class="wcfusion_get_pro">(Pro)</span>', 'wcfusion'),
                'class' => '',
                'description' => __ ('Customize the coupon code on the coupon url. Leave blank to disable feature.', 'wcfusion'),
                'type' => 'text',
                'data_type' => 'text',
                'desc_tip' => true,
                'value' => '',
                'custom_attributes' => array('readonly' => true, 'disabled' => true),
            )
        );

        woocommerce_wp_text_input (
            array(
                'id' => 'wcfusion_url_coupon_redirect_url',
                'label' => __ ('Redirect To URL', 'wcfusion'),
                'description' => __ ("This will redirect the user to the provided URL after it has been attempted to be applied. You can also pass query args to the URL for the following variables: {test}, {yes} or {errormessage} and they will be replaced with proper data. Eg. ?foo={error_message}, then test the 'foo' query arg to get the message if there is one.", 'wcfusion'),
                'desc_tip' => true,
                'type' => 'text',
                'data_type' => 'text',
                'value' => get_post_meta ($coupon_id, 'wcfusion_url_coupon_redirect_url', true) ? get_post_meta ($coupon_id, 'wcfusion_url_coupon_redirect_url', true) : '',
                'placeholder' => wc_get_cart_url (),
            )
        );

        woocommerce_wp_textarea_input (
            array(
                'id' => 'wcfusion_url_coupon_success_message',
                'label' => __ ('Success Message <span class="wcfusion_get_pro">(Pro)</span>', 'wcfusion'),
                'description' => __ ('Message that will be displayed when a coupon has been applied successfully. Leave blank to use the default message.', 'wcfusion'),
                'desc_tip' => true,
                'type' => 'textarea',
                'data_type' => 'text',
                'placeholder' => __ ('Coupon applied successfully', 'wcfusion'),
                'value' => '',
                'custom_attributes' => array('readonly' => true, 'disabled' => true),
            )
        );
        ?>
    </div>

</div>

<script>
    jQuery(document).ready(function ($) {
        // copy url
        $( ".wcfusion-copy-url-coupon-url" ).on('click', function () {
            var temp = jQuery("#wcfusion_url_coupon_url");
            temp.select();
            document.execCommand("copy");
            var $el = $('.description').find('.wcfusion-copy-url-coupon-url').eq(0).text("Copied.");
            $el.addClass('text-success');
            setTimeout(function() {
                $(".description").find('.wcfusion-copy-url-coupon-url').eq(0).text("Copy URL");
                $el.removeClass('text-success');
            }, 2000);
        });

        let $url_coupon_enable = "<?php echo $url_coupon_enable; ?>";
        if( $url_coupon_enable == '' || $url_coupon_enable == 'no' ){
            $('.wcfusion-url-coupon-options-group p').addClass('disabled');
            $('.wcfusion-url-coupon-options-group p input').prop('disabled', true);
            $('.wcfusion-url-coupon-options-group p textarea').prop('disabled', true);
            $('.wcfusion_url_coupon_enable_field').removeClass('disabled');
            $('.wcfusion-url-coupon-toggle').prop('disabled', false);
        }

        $('.wcfusion-url-coupon-toggle').on('change', function () {
            let $this = this;
            if( $this.checked ){
                $('.wcfusion-url-coupon-options-group p').removeClass('disabled');
                $('.wcfusion-url-coupon-options-group p input').prop('disabled', false);
                $('.wcfusion-url-coupon-options-group p textarea').prop('disabled', false);
            }else{
                $('.wcfusion-url-coupon-options-group p').addClass('disabled');
                $('.wcfusion-url-coupon-options-group p input').prop('disabled', true);
                $('.wcfusion-url-coupon-options-group p textarea').prop('disabled', true);
                $('.wcfusion_url_coupon_enable_field').removeClass('disabled');
                $('.wcfusion-url-coupon-toggle').prop('disabled', false);
            }
        });

        // for replace url by override code
        $( '.wcfusion-url-coupon-override' ).on( 'keyup', function () {

            const $lastIndex = $('.post-type-shop_coupon #title').val();
                  // $splitText = $prev_url.split("/"),
                  // $lastIndex = $splitText[$splitText.length - 1];

            let $this = this,
                $override_code = $($this).val(),
                $coupoon_url = $(' .wcfusion-url-coupon-url ').val(),
                $override_url = '';

            if( $override_code.length > 0 ){
                $override_url = $coupoon_url.replace(/\w+[.!?]?$/, $override_code);
            }else{
                $override_url = $coupoon_url.replace(/\w+[.!?]?$/, $lastIndex);
            }
            // set url
            $(' .wcfusion-url-coupon-url ').val($override_url);

        } );

    });
</script>
