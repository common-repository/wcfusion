/** pdf invoice & packing slips admin scripts **/
'use strict';

function wcfusion_pdf_invoice_packing_slips_init() {
    // init module
    $('#wcfusion_pdf_invoice_header').show();
    $('#wcfusion_pdf_invoice_container').show();
};

var $wfPdfInvoiceAdmin = {

    wfpi_settings       : JSON.parse(wcfusion_pi_admin_object.wcfusion_pi_settings),
    wfpi_settings_form  : "#wcfusion_form_pdf_invoice",
    wfpi_file_uploader  : ".wcfusion_file_uploader",
    wfpi_switchers      : ".wfpi_default_checked",
    wfcpi_controls      : ".wfcpi_controls",
    wfcpss_controls     : ".wfcpss_controls",

    init_wfpdf_invoice_admin: function(){

        jQuery(document).ready(function($) {

            $wfPdfInvoiceAdmin.wfpi_handle_switcher();

            $(".wcfusion_pdf_invoice_right_content .wcfusion_pdf_invoice_tab_body").hide();
            $(".wcfusion_pdf_invoice_right_content .wcfusion_pdf_invoice_tab_body[data-id='wcfusion_pdf_invoice_document']").show();

            $(".wcfusion_pdf_invoice_data_tabs .tab_item").unbind("click");
            $(".wcfusion_pdf_invoice_data_tabs .tab_item").bind("click", function (e) {
                $(".wcfusion_pdf_invoice_data_tabs .tab_item").removeClass('tab_item_active');
                $(this).addClass('tab_item_active');

                $(".wcfusion_pdf_invoice_right_content .wcfusion_pdf_invoice_tab_body").hide();
                $(".wcfusion_pdf_invoice_right_content .wcfusion_pdf_invoice_tab_body[data-id='" + $(this).data('target') + "']").show();
            });

            //file uploader
            $wfPdfInvoiceAdmin.wcfusion_pdf_invoice_media_upload();

            // toggle invoice number
            $('#wfpi_ordernumber_as_invoice_number').change( function () {
                if( $(this).prop('checked') == true ){
                    $('.wfpi_start_invoice_number').fadeOut('slow');
                }else{
                    $('.wfpi_start_invoice_number').fadeIn('slow');
                }
            });

            //woofusion customize invoice preview
            $wfPdfInvoiceAdmin.wcfusion_customize_invoice_preview();

            // trigger customize invoice controls
            $wfPdfInvoiceAdmin.wcfusion_customize_invoice_controls();

            // trigger customize shipping slip controls
            $wfPdfInvoiceAdmin.wcfusion_customize_shipping_slip_controls();

            // trigger customize shipping slip
            $wfPdfInvoiceAdmin.wcfusion_customize_shipping_slip_preview();

            // submit floating cart setting form
            $($wfPdfInvoiceAdmin.wfpi_settings_form).on( 'submit', function(e){
                $wfPdfInvoiceAdmin.submit_wfpi_settings(e);
            });

        });

    },

    //handle switcher
    wfpi_handle_switcher : function(){
        if( $wfPdfInvoiceAdmin.wfpi_settings.length <= 0 ){
            $($wfPdfInvoiceAdmin.wfpi_switchers).prop('checked', true);
        }
    },

    // Media Upload
    wcfusion_pdf_invoice_media_upload : function () {

        var $el = $( $wfPdfInvoiceAdmin.wfpi_file_uploader );

        if( $el.length > 0 ){

            var mediaUploader, $targetEl, $targetPreview;

            $($wfPdfInvoiceAdmin.wfpi_file_uploader).on('click', function (e) {

                e.preventDefault();

                $targetEl = $('#wfpi_shop_logo');
                $targetPreview = $('.preview_image > img');

                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }
                mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: 'Choose Image',
                    button: {
                        text: 'Choose Image'
                    }, multiple: false
                });
                mediaUploader.on('select', function () {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();

                    $targetEl.val(attachment.url);
                    $targetPreview.attr( 'src', attachment.url );

                });
                mediaUploader.open();
            });
        }
    },

    // define woofusion customize invoice preview
    wcfusion_customize_invoice_preview : function(){
        var $controls_data = $($wfPdfInvoiceAdmin.wfcpi_controls);

        if( $controls_data.length > 0 ){
            $controls_data.each(function ($k, $v) {
                var $controls_selector = $($v).attr('data-control');
                if( $($v).prop('checked') == true ){
                    $('.' + $controls_selector).show();
                }else {
                    $('.' + $controls_selector).hide();
                }
            });
        }

    },

    // customize invoice controls
    wcfusion_customize_invoice_controls : function(){
        $($wfPdfInvoiceAdmin.wfcpi_controls).change(function () {
            $('.wfcpi_loader').show();

            var $control = $(this).attr('data-control');

            if( $(this).prop('checked') == true ){
                setTimeout(function () {
                    $('.wfcpi_loader').hide();
                    $('.' + $control).show();
                },300);
            }else{
                setTimeout(function () {
                    $('.wfcpi_loader').hide();
                    $('.' + $control).hide();
                },300);
            }

        });
    },

    // customize shipping slip controls
    wcfusion_customize_shipping_slip_controls : function(){
        $($wfPdfInvoiceAdmin.wfcpss_controls).change(function () {
            $('.wfcpi_loader').show();

            var $control = $(this).attr('data-control');

            if( $(this).prop('checked') == true ){
                setTimeout(function () {
                    $('.wfcpi_loader').hide();
                    $('.' + $control).show();
                },300);
            }else{
                setTimeout(function () {
                    $('.wfcpi_loader').hide();
                    $('.' + $control).hide();
                },300);
            }

        });
    },

    // define woofusion customize shipping slip preview
    wcfusion_customize_shipping_slip_preview : function(){
        var $controls_data = $($wfPdfInvoiceAdmin.wfcpss_controls);

        if( $controls_data.length > 0 ){
            $controls_data.each(function ($k, $v) {
                var $controls_selector = $($v).attr('data-control');
                if( $($v).prop('checked') == true ){
                    $('.' + $controls_selector).show();
                }else {
                    $('.' + $controls_selector).hide();
                }
            });
        }

    },

    // submit settings from
    submit_wfpi_settings : function (e) {
        e.preventDefault();
        let $submit_button = $('.wcfusion_pdf_invoice_btn');
        $submit_button.text( 'Please Wait....' );
        $submit_button.addClass( 'wcfusion-pi-btn-disabled' );
        $submit_button.prop( 'disabled', true );

        let $post_data = {'action': 'wcfusion_save_pdf_invoice_settings', 'data': $($wfPdfInvoiceAdmin.wfpi_settings_form).serializeArray()};

        $.ajax({
            url: ajaxurl,
            type: "POST",
            data: $post_data,
            success: function(res){
                var $obj = JSON.parse(res);
                if ($obj.status == 'true') {
                    Command: toastr["success"]("Settings Saved Successfully.");
                    $submit_button.text('Save Settings');
                    $submit_button.removeClass('wcfusion-pi-btn-disabled');
                    $submit_button.prop('disabled', false);
                }else{
                    Command: toastr["error"]("Failed. Please try again!");
                    $submit_button.text('Save Settings');
                    $submit_button.removeClass('wcfusion-pi-btn-disabled');
                    $submit_button.prop('disabled', false);
                    console.log('Oops: something is wrong please try later!');
                }
            }
        });
    }

};

//load js for backend
$wfPdfInvoiceAdmin.init_wfpdf_invoice_admin();