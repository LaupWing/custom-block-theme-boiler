<?php
/**
 * Title: Footer
 * Slug: custom-block-theme/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 */
?>
<!-- wp:group {"tagName":"footer","className":"bg-gray-900 text-white py-12"} -->
<footer class="wp-block-group bg-gray-900 text-white py-12">

    <!-- wp:group {"className":"max-w-7xl mx-auto px-4"} -->
    <div class="wp-block-group max-w-7xl mx-auto px-4">

        <!-- wp:columns {"className":"gap-8 mb-8"} -->
        <div class="wp-block-columns gap-8 mb-8">

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:site-logo {"width":120} /-->

                <!-- wp:paragraph {"className":"mt-4 text-gray-400"} -->
                <p class="mt-4 text-gray-400">Building amazing experiences with modern WordPress.</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:heading {"level":4,"className":"text-white mb-4"} -->
                <h4 class="wp-block-heading text-white mb-4">Quick Links</h4>
                <!-- /wp:heading -->

                <!-- wp:navigation {"overlayMenu":"never","layout":{"type":"flex","orientation":"vertical"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} /-->
            </div>
            <!-- /wp:column -->

            <!-- wp:column -->
            <div class="wp-block-column">
                <!-- wp:heading {"level":4,"className":"text-white mb-4"} -->
                <h4 class="wp-block-heading text-white mb-4">Contact</h4>
                <!-- /wp:heading -->

                <!-- wp:paragraph {"className":"text-gray-400"} -->
                <p class="text-gray-400">Email: hello@example.com<br>Phone: (555) 123-4567</p>
                <!-- /wp:paragraph -->
            </div>
            <!-- /wp:column -->

        </div>
        <!-- /wp:columns -->

        <!-- wp:separator {"className":"bg-gray-700 mb-8"} -->
        <hr class="wp-block-separator has-alpha-channel-opacity bg-gray-700 mb-8"/>
        <!-- /wp:separator -->

        <!-- wp:group {"className":"text-center"} -->
        <div class="wp-block-group text-center">
            <!-- wp:paragraph {"className":"text-gray-400"} -->
            <p class="text-gray-400">© 2025 Custom Block Theme. All rights reserved.</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->

    </div>
    <!-- /wp:group -->

</footer>
<!-- /wp:group -->
