<?php
/**
 * Title: Header
 * Slug: custom-block-theme/header
 * Categories: header
 * Block Types: core/template-part/header
 */
?>
<!-- wp:group {"tagName":"header","className":"absolute left-0 right-0 top-8 z-50 px-4","layout":{"type":"default"}} -->
<header class="wp-block-group absolute left-0 right-0 top-8 z-50 px-4">

    <!-- wp:group {"className":"mx-auto flex max-w-7xl items-center justify-between rounded-full bg-white px-6 py-3 shadow-lg","layout":{"type":"flex","justifyContent":"space-between"}} -->
    <div class="wp-block-group mx-auto flex max-w-7xl items-center justify-between rounded-full bg-white px-6 py-3 shadow-lg">

        <!-- Logo Section -->
        <!-- wp:group {"className":"flex items-center gap-2","layout":{"type":"flex","flexWrap":"nowrap"}} -->
        <div class="wp-block-group flex items-center gap-2">

            <!-- Logo Icon -->
            <!-- wp:group {"className":"flex h-8 w-8 items-center justify-center rounded-full bg-indigo-600 text-white","layout":{"type":"default"}} -->
            <div class="wp-block-group flex h-8 w-8 items-center justify-center rounded-full bg-indigo-600 text-white">
                <!-- wp:html -->
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <!-- /wp:html -->
            </div>
            <!-- /wp:group -->

            <!-- Site Title -->
            <!-- wp:site-title {"level":0,"className":"text-2xl font-black tracking-tighter text-indigo-700 m-0"} /-->

        </div>
        <!-- /wp:group -->

        <!-- Desktop Navigation -->
        <!-- wp:group {"className":"hidden md:flex items-center gap-8","layout":{"type":"flex"}} -->
        <div class="wp-block-group hidden md:flex items-center gap-8">

            <!-- Navigation Menu -->
            <!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","justifyContent":"left"}} /-->

            <!-- CTA Button -->
            <!-- wp:buttons -->
            <div class="wp-block-buttons">
                <!-- wp:button {"className":"is-style-fill"} -->
                <div class="wp-block-button is-style-fill">
                    <a class="wp-block-button__link rounded-full bg-[#a3e635] px-6 py-2.5 text-sm font-bold uppercase tracking-wide text-black transition-transform hover:scale-105 wp-element-button" href="/contact">Contact Us</a>
                </div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->

        </div>
        <!-- /wp:group -->

        <!-- Mobile Navigation -->
        <!-- wp:navigation {"overlayMenu":"mobile","className":"md:hidden"} /-->

    </div>
    <!-- /wp:group -->

</header>
<!-- /wp:group -->
