<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 */

get_header(); ?>

<section class="not-found" >

    <img  src="<?php bloginfo('template_directory'); ?>/img/404.svg" alt="">
    <div class="container">
        <div class="page-wrapper">
            <div class="page-content not-found-box">
                <h2><?php _e( 'Sorry we did not found the page your were looking for!', 'atrovan' ); ?></h2>
            </div>
        </div>
    </div>
</section>







<?php get_footer(); ?>
