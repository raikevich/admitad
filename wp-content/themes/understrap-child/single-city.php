<?php get_header(); ?>
   <div class="container my-5">
      <h1><?php the_title(); ?></h1>
      <div class="row">
         <?php
         $reals = get_posts(array( 'post_type' => 'real',
             'order' => 'DESC',
             'orderby' => 'date',
             'posts_per_page' => 9,
             'meta_key' => 'city',
             'meta_value' => get_the_ID(),
         ));

         foreach ( $reals as $real ) { ?>
            <div class="col-12 col-md-4">
               <?php echo_real( $real->ID, false ) ?>
            </div>
         <?php } ?>
      </div>
   </div>
<?php get_footer(); ?>