<?php
/**
 * wofusion floacting cart master inline style
 * inline-style.php
 */

// get settings data
$wffc_style_settings = get_option ('wcfusion_floating_cart_settings', false);

//general style
$wcfusion_fc_width = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fc_width']) ? $wffc_style_settings['wcfusion_fc_width'] : '460';
$wcfusion_fc_open_from = 'right';
$wcfusion_fctbfc_style = '#ffffff';
$wcfusion_fcbfs_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fcbfs_style']) ? $wffc_style_settings['wcfusion_fcbfs_style'] : '16';
$wcfusion_fcbbg_style = '#000000';
$wcfusion_fcbhfc_style = '#ffffff';
$wcfusion_fcbhbg_style = '#000';
$wcfusion_fc_button_bc = '#000';
$wcfusion_fcbhc_style = '#000';
$wcfusion_fcbbr_style = '5';

// header style settings
$wcfusion_fchta_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fchta_style']) ? $wffc_style_settings['wcfusion_fchta_style'] : '';
$wcfusion_fchbis_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fchbis_style']) ? $wffc_style_settings['wcfusion_fchbis_style'] : '35';
$wcfusion_fchcia_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fchcia_style']) ? $wffc_style_settings['wcfusion_fchcia_style'] : '';
$wcfusion_fcci_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fcci_style']) ? $wffc_style_settings['wcfusion_fcci_style'] : '';
$wcfusion_fccis_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fccis_style']) ? $wffc_style_settings['wcfusion_fccis_style'] : '25';
$wcfusion_fchfs_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fchfs_style']) ? $wffc_style_settings['wcfusion_fchfs_style'] : '21';
$wcfusion_fchfc_style = '#3a3a3a';
$wcfusion_fchbg_style = '#F6F5FA';

//cart content style
$wcfusion_fcccdis_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fcccdis_style']) ? $wffc_style_settings['wcfusion_fcccdis_style'] : '20';
$wcfusion_fccdi_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fccdi_style']) ? $wffc_style_settings['wcfusion_fccdi_style'] : '';
$wcfusion_fcccfs_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fcccfs_style']) ? $wffc_style_settings['wcfusion_fcccfs_style'] : '16';
$wcfusion_fccfc_style = '#000';
$wcfusion_fccbc_style = '#F6F5FA';

//Cart Content Product Style
$wcfusion_fcccpiw_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fcccpiw_style']) ? $wffc_style_settings['wcfusion_fcccpiw_style'] : '20';
$wcfusion_fccpip_style = '0';
$wcfusion_fcipthc_style = '#000';
$wcfusion_fciptfs_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fciptfs_style']) ? $wffc_style_settings['wcfusion_fciptfs_style'] : '16';
$wcfusion_fciptc_style = '#000';
$wcfusion_fccpid_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fccpid_style']) ? $wffc_style_settings['wcfusion_fccpid_style'] : '';

$wcfusion_fccpqibw_style = '40';
$wcfusion_fccpqibbr_style = '3';
$wcfusion_fccpqibbc_style = '#ccc';
$wcfusion_fccpqibbgc_style = '#ffffff';
$wcfusion_fccpqibtc_style = '#666';

// suggested product
$wcfusion_fcspiw_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fcspiw_style']) ? $wffc_style_settings['wcfusion_fcspiw_style'] : '80';
$wcfusion_fcspfs_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fcspfs_style']) ? $wffc_style_settings['wcfusion_fcspfs_style'] : '16';
$wcfusion_fcspbg_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fcspbg_style']) ? $wffc_style_settings['wcfusion_fcspbg_style'] : '#fff';
$wcfusion_fccpid_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fccpid_style']) ? $wffc_style_settings['wcfusion_fccpid_style'] : 'after_totals';

// footer style
$wcfusion_fcfpf_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fcfpf_style']) ? 'yes' : 'no';
$wcfusion_fcfp_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fcfp_style']) ? $wffc_style_settings['wcfusion_fcfp_style'] : '0';

// basket style
$wcfusion_fcbs_enable = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fcbs_enable']) ? $wffc_style_settings['wcfusion_fcbs_enable'] : 'show_always';
$wcfusion_fcbs_shape = !empty($wffc_style_settings) && !empty($wffc_style_settings['wcfusion_fcbs_shape']) ? $wffc_style_settings['wcfusion_fcbs_shape'] : '100';
$wcfusion_fcbs_icon_size = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fcbs_icon_size']) ? $wffc_style_settings['wcfusion_fcbs_icon_size'] : '35';
$wcfusion_fc_sc_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fc_sc_style']) ? 'yes' : 'no';
$wcfusion_fc_bset_icon = 'icon-basket1';
$wcfusion_fcbp_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fcbp_style']) ? $wffc_style_settings['wcfusion_fcbp_style'] : 'bottom_right';
$wcfusion_fcbov_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fcbov_style']) ? $wffc_style_settings['wcfusion_fcbov_style'] : '110';
$wcfusion_fcboh_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fcboh_style']) ? $wffc_style_settings['wcfusion_fcboh_style'] : '60';
$wcfusion_fcbcp_style = !empty($wffc_style_settings) && isset($wffc_style_settings['wcfusion_fcbcp_style']) ? $wffc_style_settings['wcfusion_fcbcp_style'] : 'top_left';
$wcfusion_fcbc_style = '#fff';
$wcfusion_fcbbc_style = '#000';
$wcfusion_fcbcc_style = '#fff';
$wcfusion_fcbcbc_style = '#d00';

?>


<style>
    #wcfusion-fct-body .wcfusion-fct-content-wrap {
        max-width: <?php echo $wcfusion_fc_width . 'px'; ?>;
    }

    <?php
        if( $wcfusion_fc_open_from == 'top' ){ ?>

    #wcfusion-fct-body.fct-show .wcfusion-fct-content-wrap {

    }

    <?php }elseif ( $wcfusion_fc_open_from == 'bottom' ){ ?>

    #wcfusion-fct-body.fct-show .wcfusion-fct-content-wrap {

    }

    <?php }elseif ( $wcfusion_fc_open_from == 'left' ){ ?>
    .wcfusion-fct-main #wcfusion-fct-body.fct-show .wcfusion-fct-content-wrap {
        left: 0px;
    }

    .wcfusion-fct-main .wcfusion-fct-content-wrap {
        left: -470px;
    }

    <?php }else{ ?>
    .wcfusion-fct-main #wcfusion-fct-body.fct-show .wcfusion-fct-content-wrap {
        right: 0px;
    }

    .wcfusion-fct-main .wcfusion-fct-content-wrap {
        right: -470px;
    }

    <?php } ?>

    /*#wcfusion-fct-body.fct-show .wcfusion-fct-content-wrap {*/
    /*    transform: translate(0);*/
    /*}*/

    #wcfusion-fct-body .fct-footer .fct-checkout a,
    #wcfusion-fct-body .fct-footer .fct-continue-shopping a,
    #wcfusion-fct-body .fct-footer .fct-view-card a {
        font-size: <?php echo $wcfusion_fcbfs_style . 'px'; ?>;
        border-radius: <?php echo $wcfusion_fcbbr_style . 'px'; ?>;
    }

    #wcfusion-fct-body .wcfusion-fct-content .wfct-button button,
    #wcfusion-fct-body .wcfusion-fct-content .wfct-button a {
        font-size: <?php echo $wcfusion_fcbfs_style . 'px'; ?>;
        background: <?php echo $wcfusion_fcbbg_style; ?>;
        color: <?php echo $wcfusion_fctbfc_style; ?>;
    }

    #wcfusion-fct-body .wcfusion-fct-content .wfct-button button:hover,
    #wcfusion-fct-body .wcfusion-fct-content .wfct-button a:hover {
        color: <?php echo $wcfusion_fcbhfc_style ?>;
        background: <?php echo $wcfusion_fcbhbg_style; ?>;
        border-color: <?php echo $wcfusion_fcbhc_style; ?>;
    }

    #wcfusion-fct-body .fct-footer .fct-checkout a,
    #wcfusion-fct-body .fct-footer .fct-continue-shopping a,
    #wcfusion-fct-body .fct-footer .fct-view-card a {
        border-color: <?php echo $wcfusion_fc_button_bc; ?>;
    }

    #wcfusion-fct-body .fct-cart-empty .fct-continue-shopping a {
        border-radius: <?php echo $wcfusion_fcbbr_style . 'px'; ?>;
    }

    #wcfusion-fct-body section.fct-coupon button {
        border-radius: 0px <?php echo $wcfusion_fcbbr_style . 'px '; ?> <?php echo $wcfusion_fcbbr_style . 'px'; ?> 0px;
    }

    #wcfusion-fct-body .fct-right-header svg {
        width: <?php echo $wcfusion_fccis_style;?>;
        height: <?php echo $wcfusion_fccis_style;?>
    }

    #wcfusion-fct-body .fct-header h4 {
        font-size: <?php echo $wcfusion_fchfs_style . 'px';?>;
        color: <?php echo $wcfusion_fchfc_style;?>;
    }

    #wcfusion-fct-body .wcfusion-cart-icon i.demo-icon {
        font-size: <?php echo $wcfusion_fchbis_style . 'px';?>;
        color: <?php echo $wcfusion_fchfc_style;?>;
    }

    #wcfusion-fct-body .fct-header {
        background: <?php echo $wcfusion_fchbg_style;?>;
    }

    .fct-product-list .fct-cart-product-qt input[type=button],
    .fct-product-list .fct-cart-product-qt input[type=text],
    .fct-product-list .fct-product-price .woocommerce-Price-amount,
    .fct-product-list .fct-cart-product-name a, {
        font-size: <?php echo $wcfusion_fcccfs_style; ?>px;
    }

    .fct-product-list .wcfusion-fct-remove-item i.demo-icon {
        font-size: <?php echo $wcfusion_fcccdis_style; ?>px;
    }

    .wffc-qty-price,
    .fct-product-price .woocommerce-Price-amount,
    .wffc-qty-price .woocommerce-Price-amount {
        color: <?php echo $wcfusion_fccfc_style; ?>;
    }

    #wcfusion-fct-body .wcfusion-fct-content-wrap {
        background: <?php echo $wcfusion_fccbc_style; ?>;
    }

    #wcfusion-fct-body .fct-product-item .fct-cart-img {
        width: <?php echo $wcfusion_fcccpiw_style; ?>%;
    }

    #wcfusion-fct-body .fct-product-item .fct-cart-img {
        padding: <?php echo $wcfusion_fccpip_style; ?>;
    }

    #wcfusion-fct-body .fct-cart-product-name a {
        color: <?php echo $wcfusion_fciptc_style; ?>;
    }

    #wcfusion-fct-body .fct-cart-product-name a:hover {
        color: <?php echo $wcfusion_fcipthc_style; ?>;
    }

    #wcfusion-fct-body .fct-cart-product-name a:hover {
        font-size: <?php echo $wcfusion_fciptfs_style; ?>px;
    }

    #wcfusion-fct-body .fct-cart-product-qt input[type=text] {
        width: <?php echo $wcfusion_fccpqibw_style; ?>px;
    }

    #wcfusion-fct-body .fct-cart-product-qt input[type=text] {
        border-radius: <?php echo $wcfusion_fccpqibbr_style; ?>px;
    }

    #wcfusion-fct-body .fct-cart-product-qt input[type=text] {
        border-color: <?php echo $wcfusion_fccpqibbc_style; ?>;
    }

    #wcfusion-fct-body .fct-cart-product-qt input[type=text] {
        color: <?php echo $wcfusion_fccpqibtc_style; ?>;
    }

    #wcfusion-fct-body .fct-cart-product-qt input[type=text] {
        background: <?php echo $wcfusion_fccpqibbgc_style; ?>;
    }

    #wcfusion-fct-body footer.fct-footer {
        padding: <?php echo $wcfusion_fcfp_style; ?>;
    }

    .wcfusion-fct-main div#wcfusion-fct button {
        border-radius: <?php echo $wcfusion_fcbs_shape; ?>%;
        background: <?php echo $wcfusion_fcbbc_style; ?>;
    }

    #wcfusion-fct span.wofusion-fci-total {
        color: <?php echo $wcfusion_fcbcc_style; ?>;
        background: <?php echo $wcfusion_fcbcbc_style; ?>;
    }

    #wcfusion-fct i.demo-icon {
        color: <?php echo $wcfusion_fcbc_style; ?>;
        font-size: <?php echo $wcfusion_fcbs_icon_size; ?>px;
    }

    <?php
        if( $wcfusion_fcbp_style == 'top_left' ){ ?>
    .wcfusion-fct-main div#wcfusion-fct {
        top: 110px;
        bottom: auto;
        right: auto;
        left: <?php echo $wcfusion_fcboh_style;?>px;
    }

    <?php }elseif ( $wcfusion_fcbp_style == 'top_right' ){ ?>
    .wcfusion-fct-main div#wcfusion-fct {
        top: <?php echo $wcfusion_fcbov_style; ?>px;
        bottom: auto;
        right: <?php echo $wcfusion_fcboh_style;?>px;
        left: auto;
    }

    <?php }elseif ( $wcfusion_fcbp_style == 'bottom_left' ){ ?>
    .wcfusion-fct-main div#wcfusion-fct {
        top: auto;
        bottom: <?php echo $wcfusion_fcbov_style; ?>px;
        right: auto;
        left: <?php echo $wcfusion_fcboh_style;?>px;
    }

    <?php }else{?>
    .wcfusion-fct-main div#wcfusion-fct {
        top: auto;
        bottom: <?php echo $wcfusion_fcbov_style; ?>px;
        right: <?php echo $wcfusion_fcboh_style;?>px;
        left: auto;
    }

    <?php } ?>

    <?php
        if( $wcfusion_fcbcp_style == 'top_right' ){ ?>
    #wcfusion-fct span.wofusion-fci-total {
        top: 0px;
        right: -11px;
    }

    <?php }elseif ( $wcfusion_fcbcp_style == 'bottom_left' ){ ?>
    #wcfusion-fct span.wofusion-fci-total {
        bottom: 0px;
        left: -11px;
    }

    <?php }elseif ( $wcfusion_fcbcp_style == 'bottom_right' ){ ?>
    #wcfusion-fct span.wofusion-fci-total {
        bottom: 0px;
        right: -11px;
    }

    <?php }else{?>
    #wcfusion-fct span.wofusion-fci-total {
        top: 0px;
        left: -11px;
    }

    <?php } ?>

</style>
