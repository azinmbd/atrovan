
<?php

/* Template name: Blog */

get_header(); ?>

<!-- blog tab sesign -->
<section class="mt-4 pt-5 blog-bg">
    <div class="container pt-4">
        <h3 class="title text-center">Atrovan blog</h3>
        <p class="paragraph text-center mt-4">  </p>
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

   

    <!-- blog posts -->
    <section class="mt-4">
        <div class="container mb-4 mt-1" >
            <?php
            // the query
            $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>

            <?php if ( $wpb_all_query->have_posts() ) : ?>

                <div class="row">

                    <!-- the loop -->
                    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
                        <div class="col-lg-4 col-sm-12 ">
                            <div   class="blog-post">
                                <div class="post-img" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">
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

                    <?php endwhile; ?>
                    <!-- end of the loop -->

                </div>

                <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <p class="text-center blog-empty" ><?php _e( 'Sorry there is nothing written in this category.' ); ?></p>
            <?php endif; ?>

        </div>
    </section>



<?php get_footer(); ?>