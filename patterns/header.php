<?php
/**
 * Title: Header
 * Slug: custom-block-theme/header
 * Categories: header
 * Block Types: core/template-part/header
 */
?>
<!-- wp:group {"tagName":"header","className":"sticky top-0 z-50 bg-white shadow-sm"} -->
<header class="wp-block-group sticky top-0 z-50 bg-white shadow-sm">

    <!-- wp:group {"className":"container mx-auto px-[5%] py-4","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
    <div class="wp-block-group container mx-auto px-[5%] py-4">

        <!-- wp:site-logo {"width":150} /-->

        <!-- wp:group {"className":"flex items-center gap-8","layout":{"type":"flex"}} -->
        <div class="wp-block-group flex items-center gap-8">

            <!-- wp:navigation {"overlayMenu":"mobile","layout":{"type":"flex","justifyContent":"right"}} /-->

            <!-- wp:buttons -->
            <div class="wp-block-buttons">
                <!-- wp:button {"backgroundColor":"primary","textColor":"base","className":"rounded-full"} -->
                <div class="wp-block-button">
                    <a class="wp-block-button__link has-base-color has-primary-background-color rounded-full wp-element-button" href="/contact">Get Started</a>
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->

        </div>
        <!-- /wp:group -->

    </div>
    <!-- /wp:group -->

</header>
<!-- /wp:group -->
