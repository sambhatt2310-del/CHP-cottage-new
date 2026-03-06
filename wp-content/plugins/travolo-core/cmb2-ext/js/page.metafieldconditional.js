(function ($) {
    "use strict";

    let $travolo_page_breadcrumb_area = $("#_travolo_page_breadcrumb_area");
    let $travolo_page_settings = $("#_travolo_page_breadcrumb_settings");
    let $travolo_page_breadcrumb_image = $("#_travolo_breadcumb_image");
    let $travolo_page_title = $("#_travolo_page_title");
    let $travolo_page_title_settings = $("#_travolo_page_title_settings");

    if ($travolo_page_breadcrumb_area.val() == '1') {
        $(".cmb2-id--travolo-page-breadcrumb-settings").show();
        if ($travolo_page_settings.val() == 'global') {
            $(".cmb2-id--travolo-breadcumb-image").hide();
            $(".cmb2-id--travolo-page-title").hide();
            $(".cmb2-id--travolo-page-title-settings").hide();
            $(".cmb2-id--travolo-custom-page-title").hide();
            $(".cmb2-id--travolo-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--travolo-breadcumb-image").show();
            $(".cmb2-id--travolo-page-title").show();
            $(".cmb2-id--travolo-page-breadcrumb-trigger").show();

            if ($travolo_page_title.val() == '1') {
                $(".cmb2-id--travolo-page-title-settings").show();
                if ($travolo_page_title_settings.val() == 'default') {
                    $(".cmb2-id--travolo-custom-page-title").hide();
                } else {
                    $(".cmb2-id--travolo-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--travolo-page-title-settings").hide();
                $(".cmb2-id--travolo-custom-page-title").hide();

            }
        }
    } else {
        $travolo_page_breadcrumb_area.parents('.cmb2-id--travolo-page-breadcrumb-area').siblings().hide();
    }


    // breadcrumb area
    $travolo_page_breadcrumb_area.on("change", function () {
        if ($(this).val() == '1') {
            $(".cmb2-id--travolo-page-breadcrumb-settings").show();
            if ($travolo_page_settings.val() == 'global') {
                $(".cmb2-id--travolo-breadcumb-image").hide();
                $(".cmb2-id--travolo-page-title").hide();
                $(".cmb2-id--travolo-page-title-settings").hide();
                $(".cmb2-id--travolo-custom-page-title").hide();
                $(".cmb2-id--travolo-page-breadcrumb-trigger").hide();
            } else {
                $(".cmb2-id--travolo-breadcumb-image").show();
                $(".cmb2-id--travolo-page-title").show();
                $(".cmb2-id--travolo-page-breadcrumb-trigger").show();

                if ($travolo_page_title.val() == '1') {
                    $(".cmb2-id--travolo-page-title-settings").show();
                    if ($travolo_page_title_settings.val() == 'default') {
                        $(".cmb2-id--travolo-custom-page-title").hide();
                    } else {
                        $(".cmb2-id--travolo-custom-page-title").show();
                    }
                } else {
                    $(".cmb2-id--travolo-page-title-settings").hide();
                    $(".cmb2-id--travolo-custom-page-title").hide();

                }
            }
        } else {
            $(this).parents('.cmb2-id--travolo-page-breadcrumb-area').siblings().hide();
        }
    });

    // page title
    $travolo_page_title.on("change", function () {
        if ($(this).val() == '1') {
            $(".cmb2-id--travolo-page-title-settings").show();
            if ($travolo_page_title_settings.val() == 'default') {
                $(".cmb2-id--travolo-custom-page-title").hide();
            } else {
                $(".cmb2-id--travolo-custom-page-title").show();
            }
        } else {
            $(".cmb2-id--travolo-page-title-settings").hide();
            $(".cmb2-id--travolo-custom-page-title").hide();

        }
    });

    //page settings
    $travolo_page_settings.on("change", function () {
        if ($(this).val() == 'global') {
            $(".cmb2-id--travolo-breadcumb-image").hide();
            $(".cmb2-id--travolo-page-title").hide();
            $(".cmb2-id--travolo-page-title-settings").hide();
            $(".cmb2-id--travolo-custom-page-title").hide();
            $(".cmb2-id--travolo-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--travolo-breadcumb-image").show();
            $(".cmb2-id--travolo-page-title").show();
            $(".cmb2-id--travolo-page-breadcrumb-trigger").show();

            if ($travolo_page_title.val() == '1') {
                $(".cmb2-id--travolo-page-title-settings").show();
                if ($travolo_page_title_settings.val() == 'default') {
                    $(".cmb2-id--travolo-custom-page-title").hide();
                } else {
                    $(".cmb2-id--travolo-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--travolo-page-title-settings").hide();
                $(".cmb2-id--travolo-custom-page-title").hide();

            }
        }
    });

    // page title settings
    $travolo_page_title_settings.on("change", function () {
        if ($(this).val() == 'default') {
            $(".cmb2-id--travolo-custom-page-title").hide();
        } else {
            $(".cmb2-id--travolo-custom-page-title").show();
        }
    });

})(jQuery);