<?php

/* The template for displaying Category pages */

get_header(); ?>


<!-- blog tab sesign -->
<section class="mt-4 pt-5 blog-bg">
    <div class="container pt-4">
        <h3 class="title text-center">Atrovan blog</h3>
        <p class="paragraph text-center mt-4">   </p>
    </div>
    <div class="container pt-5 blog-border">
    <?php
                wp_nav_menu([
                    'theme_location'  => 'blog-tab',
                    'container'       => 'div',
                    'container_id'    => '',
                    'container_class' => '',
                    'menu_id'         => 'blog-tab',
                    'menu_class'      => 'navbar-nav d-flex flex-row justify-content-center nav-link nav-item ',
                    'depth'           => 0,
                ]);
                ?>
    </div>
</section>



    <section id="primary" class="site-content ">
        <div id="content" role="main">
            <div class="container">
                <div class="row mb-5">


                    <?php
                    // Check if there are any posts to display
                    if ( have_posts() ) : ?>

                        <header class="archive-header">
                            <h1 class="archive-title d-none">Category: <?php single_cat_title( '', false ); ?></h1>


                            <?php
                            // Display optional category description
                            if ( category_description() ) : ?>
                                <div class="archive-meta"><?php echo category_description(); ?></div>
                            <?php endif; ?>
                        </header>

                        <?php

// The Loop
                        while ( have_posts() ) : the_post(); ?>
                            <div class="col-lg-4 col-sm-12 ">
                                <div   class="blog-post">
                                    <div class="post-img " style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">
                                        <div class="post-tag">
                                            <button href="#"><?php the_category(); ?></button>
                                        </div>
                                    </div>
                                    <a class="post-title"  href="<?php the_permalink(); ?>">
                                        <h5><?php the_title(); ?></h5>
                                        <?php the_excerpt(); ?>
                                    </a>
                                </div>
                            </div>

                        <?php endwhile;

                    else: ?>
                        <p class="text-center blog-empty">Sorry there is no posts written!</p>


                    <?php endif; ?>
                </div>
            </div>

        </div>
    </section>


<?php get_footer();?>