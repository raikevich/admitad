<?php get_header(); ?>

<?php get_header(); ?>
   <div class="container mt-5 mb-3">
      <div class="row">
         <div class="col">
            <h1>Города</h1>
         </div>
      </div>
   </div>
<?php
if ( have_posts() ) : ?>
   <div class="container">
      <div class="row">
         <?php
         while ( have_posts() ) :
            the_post(); ?>
            <div class="col-12 col-md-4">
               <a href="<?php the_permalink(); ?>" class="real__item">
                  <?php echo get_the_post_thumbnail(null, 'thumbnail'); ?>
                  <h5><?php echo get_the_title(); ?></h5>
               </a>
            </div>
         <?php
         endwhile; ?>
      </div>
      <div class="row">
         <div class="col">
            <?php the_posts_pagination(); ?>
         </div>
      </div>
   </div>
<?php
endif;
?>

<?php get_footer(); ?>

<?php get_footer(); ?>