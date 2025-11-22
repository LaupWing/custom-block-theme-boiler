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

        <!-- Logo Left -->
        <!-- wp:group {"className":"flex items-center gap-2","layout":{"type":"flex"}} -->
        <div class="wp-block-group flex items-center gap-2">
            <!-- wp:site-logo {"width":32,"className":"logo-icon"} /-->
            <!-- wp:site-title {"level":0,"className":"logo-text"} /-->
        </div>
        <!-- /wp:group -->

        <!-- Desktop Navigation Right -->
        <!-- wp:group {"className":"flex items-center gap-8","layout":{"type":"flex"}} -->
        <div class="wp-block-group flex items-center gap-8">

            <!-- Static Navigation Links -->
            <!-- wp:group {"className":"flex gap-6","layout":{"type":"flex"}} -->
            <nav class="wp-block-group flex gap-6">
                <!-- wp:paragraph {"className":"nav-link m-0"} -->
                <p class="nav-link m-0"><a href="/">HOME</a></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"className":"nav-link m-0"} -->
                <p class="nav-link m-0"><a href="/services">SERVICES</a></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"className":"nav-link m-0"} -->
                <p class="nav-link m-0"><a href="/doctors">DOCTORS</a></p>
                <!-- /wp:paragraph -->

                <!-- wp:paragraph {"className":"nav-link m-0"} -->
                <p class="nav-link m-0"><a href="/blog">BLOG</a></p>
                <!-- /wp:paragraph -->
            </nav>
            <!-- /wp:group -->

            <!-- CTA Button -->
            <!-- wp:html -->
            <a href="/contact" class="btn-cta">Contact Us</a>
            <!-- /wp:html -->

        </div>
        <!-- /wp:group -->

    </div>
    <!-- /wp:group -->

</header>
<!-- /wp:group -->
