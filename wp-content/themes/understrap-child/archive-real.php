<?php get_header(); ?>
   <div class="container mt-5 mb-3">
      <h1>Недвижимость</h1>
   </div>
<?php
if ( have_posts() ) : ?>
   <div class="container">
      <div class="row">
         <?php
         while ( have_posts() ) :
            the_post(); ?>
            <div class="col-12 col-md-4">
               <?php echo_real( get_the_ID() ) ?>
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