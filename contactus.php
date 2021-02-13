
<?php

/* Template name: contactus */
get_header(); ?>

<section class="contactus-bg pt-5 pb-5">
<div class="container contactus-box mb-5 mt-5">
    <div class="row">
        <div class="col-lg-5">   
            <div><h1 class="title">Contact us</h1>
        <div>
            <a href="tel:021-66406769" class="contactus-detail mt-4 mb-4">
                <img src="<?php bloginfo('template_directory'); ?>/img/smartphone.svg" width="38px" alt="">
                <span>021-66406769</span>
            </a>
            <a href="info@Navgoon.com" class="contactus-detail  mb-4" >
                <img src="<?php bloginfo('template_directory'); ?>/img/email.svg" width="35px" alt="">
                <span>info@Navgoon.com</span>
</a>
            <a href="https://goo.gl/maps/13hqZf3C59oWBRsW9" class="contactus-detail  mb-4">
                <img src="<?php bloginfo('template_directory'); ?>/img/placeholder.svg" width="30px" alt="">
                <span>Room No.105, Unit 5, 1st Floor, Ibn Sina Technology Tower, No.7, Shahid Balavar Alley, Valiasr intersection, Enghelab Ave</span>
</a>
            
        </div></div>           
              </div>
        <div class="col-lg-7 p-5">
            <h1 class="title text-center">Demo request</h1>
            <p class="paragraph text-center">
            Navgoon is suitable for a wide range of business applications.
            </p>
            <div class="mt-4 mb-4">

            <?php echo do_shortcode('[wpforms id="13" title="false" description="false"]'); ?>
            </div>
    </div>
    </div>
</div>
</section>


<?php get_footer(); ?>