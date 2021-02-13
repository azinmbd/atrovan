<?php
/**
 * The template for displaying all single posts and attachments
 *
 */

get_header(); ?>


<!-- blog tab sesign -->
<section class="mt-4 pt-5 blog-bg">
    <div class="container pt-4">
        <h3 class="title text-center">Atrovan Blog</h3>
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



    <!-- blog post design -->
    <section class="mt-5 pt-5 post-color">
        <div class="container mb-5 mobile-mb-0">
            <div class="row">
                <div class="col-lg-4 p-lg-0 col-sm-12 d-flex justify-content-center align-items-center">
                    <div class="blog-post-info">
                        <div class="post-tag-date">
                            <span class="post-date"><?php echo get_the_date( get_option('date_format') ); ?></span>
                            <span class="title-tags "><?php
                            foreach((get_the_category()) as $category) {
                                echo $category->cat_name . ' ';
                            } ?></span>
                        </div>
                        <h1 class="post-title">
                            <?php the_title_attribute(array('post'=>$id)); ?>
                        </h1>
                    </div>
                </div>
                <div class="col-lg-8 p-lg-0 col-sm-12 featured-img" >
                    <?php echo get_the_post_thumbnail(  $post->ID ); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-sm-12 post-text">

                    <?= get_post_field('post_content', $post->ID) ?>

                </div>
                <div class="col-lg-2 col-sm-12">
                    <div class="share-social">
                        <h6>Share</h6>
                        <div>
                            <a href="https://t.me/share/url?url=<?php the_permalink(); ?> &text= <?php echo get_the_title();?>  &to={phone_number}"><img src="<?php bloginfo('template_directory'); ?>/img/telegram.svg" alt=""></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


<?php get_footer(); ?>