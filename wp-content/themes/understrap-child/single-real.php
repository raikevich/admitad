<?php get_header(); ?>
   <div class="container my-5">
      <div class="row">
         <div class="col-12 col-md-6">
            <h1><?php the_title(); ?></h1>
            <?php
            $id = get_the_ID();
            $terms = get_the_terms($id, 'real-type');
            $term_str = '';
            foreach ( $terms as $term ) {
               $term_str .= $term->name.', ';
            }
            $term_str = substr($term_str, 0, -2);
            ?>
            <p><?php echo $term_str; ?></p>
            <ul>
               <?php
               $properties_real = [ 'space', 'cost', 'address', 'living_space', 'floor', 'city' ];

               foreach ( $properties_real as $prop ) {
                  $prop_name = get_field_object($prop, $id)['label'];

                  if ( $prop == 'city' ) {
                     $prop_value = get_field($prop, $id);
                     $prop_value = '<a href="/city/'.$prop_value->post_name.'">'.$prop_value->post_title.'</a>';
                  } else {
                     $prop_value = get_field($prop, $id);
                  }

                  $output = $prop_value ? '<li>'.$prop_name.': '.$prop_value.'</li>' : '';
                  echo $output;
               }
               ?>
            </ul>
         </div>
         <div class="col-12 col-md-6">
            <?php echo get_the_post_thumbnail(null, 'medium'); ?>
         </div>
      </div>
   </div>
<?php get_footer(); ?>