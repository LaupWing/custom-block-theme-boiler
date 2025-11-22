<?php
/**
 * Title: Header
 * Slug: custom-block-theme/header
 * Categories: header
 * Block Types: core/template-part/header
 */
?>
<!-- wp:group {"tagName":"header","className":"absolute left-0 right-0 top-8 z-50 px-4"} -->
<header class="wp-block-group absolute left-0 right-0 top-8 z-50 px-4">

    <!-- wp:group {"className":"header-floating","layout":{"type":"flex","justifyContent":"space-between"}} -->
    <div class="wp-block-group header-floating">

        <!-- wp:group {"className":"flex items-center gap-2","layout":{"type":"flex"}} -->
        <div class="wp-block-group flex items-center gap-2">
            <!-- wp:site-logo {"width":32,"className":"logo-icon"} /-->
            <!-- wp:site-title {"className":"logo-text"} /-->
        </div>
        <!-- /wp:group -->

        <!-- Desktop Navigation - Using wp:navigation block (WordPress injects menu here) -->
        <!-- wp:group {"className":"hidden md:flex items-center gap-8","layout":{"type":"flex"}} -->
        <div class="wp-block-group hidden md:flex items-center gap-8">

            <!-- wp:navigation {"ref":1,"overlayMenu":"never","className":"nav-link","layout":{"type":"flex","justifyContent":"right"}} /-->

            <!-- wp:buttons -->
            <div class="wp-block-buttons">
                <!-- wp:button {"className":"btn-cta"} -->
                <div class="wp-block-button btn-cta">
                    <a class="wp-block-button__link wp-element-button" href="/contact">Contact Us</a>
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
