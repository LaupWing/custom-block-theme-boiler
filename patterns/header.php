<?php
/**
 * Title: Header
 * Slug: custom-block-theme/header
 * Categories: header
 * Block Types: core/template-part/header
 */
?>
<!-- wp:html -->
<header class="absolute left-0 right-0 top-8 z-50 px-4">
    <div class="mx-auto flex max-w-7xl items-center justify-between rounded-full bg-white px-6 py-3 shadow-lg">

        <!-- Logo Left -->
        <a href="/" class="flex items-center gap-2">
            <div class="flex h-8 w-8 items-center justify-center rounded-full bg-indigo-600 text-white">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div class="text-2xl font-black tracking-tighter text-indigo-700">SMILEO</div>
        </a>
<!-- /wp:html -->

        <!-- Desktop Navigation Right -->
        <!-- wp:group {"className":"hidden md:flex items-center gap-8","layout":{"type":"flex"}} -->
        <div class="wp-block-group hidden md:flex items-center gap-8">

            <!-- WordPress Navigation - Will show your menu items -->
            <!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","justifyContent":"left"}} -->
            <!-- /wp:navigation -->

            <!-- wp:html -->
            <a href="/contact" class="rounded-full bg-[#a3e635] px-6 py-2.5 text-sm font-bold uppercase tracking-wide text-black transition-transform hover:scale-105">
                Contact Us
            </a>
            <!-- /wp:html -->

        </div>
        <!-- /wp:group -->

        <!-- Mobile Navigation -->
        <!-- wp:navigation {"overlayMenu":"mobile","className":"md:hidden"} -->
        <!-- /wp:navigation -->

<!-- wp:html -->
    </div>
</header>
<!-- /wp:html -->
