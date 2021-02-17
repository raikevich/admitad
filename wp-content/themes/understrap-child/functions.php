<?php

// Include style.css
function custom_style() {
   wp_enqueue_style('parent-style', get_stylesheet_directory_uri().'/style.css');
}

add_action('wp_enqueue_scripts', 'custom_style');


// Include script.js
function enqueue_script() {
   wp_enqueue_script('script', get_stylesheet_directory_uri().'/js/script.js');
}

add_action('get_footer', 'enqueue_script');


// Ajax add Real
add_filter('wp_ajax_add_real', 'add_real');
add_filter('wp_ajax_nopriv_add_real', 'add_real');

function add_real() {

   if ( $_POST['title'] === '' ) {
      $response['result'] = 'Введите заголовок';
      echo json_encode($response);
      wp_die();
   } else {
      $post_data = array(
          'post_type' => 'real',
          'post_title' => sanitize_text_field($_POST['title']),
          'post_status' => 'publish'
      );

      $post_id = wp_insert_post($post_data);

      wp_set_post_terms($post_id, array( intval($_POST['type']) ), 'real-type');

      if ( isset($_FILES['image']) ) {
         $attach_id = media_handle_upload( 'image', $post_id );
         set_post_thumbnail( $post_id, $attach_id );
      }

      update_field('address', $_POST['address'], $post_id);
      update_field('cost', $_POST['cost'], $post_id);
      update_field('floor', $_POST['floor'], $post_id);
      update_field('living_space', $_POST['living_space'], $post_id);
      update_field('space', $_POST['space'], $post_id);
      update_field('city', intval($_POST['city']), $post_id);

      $response['result'] = 'Недвижимость '.$_POST['title'].' добавлена.';

      echo json_encode($response);

      wp_die();
   }

}


// Echo real
function echo_real( $id, $show_city = true ) { ?>
   <a href="<?php the_permalink($id); ?>" class="real__item">
      <?php echo get_the_post_thumbnail($id, 'thumbnail'); ?>
      <h5><?php echo get_the_title($id); ?></h5>
      <?php
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
               if ( $show_city ) {
                  $prop_value = get_field($prop, $id);
                  $prop_value = $prop_value->post_title;
               } else {
                  continue;
               }
            } else {
               $prop_value = get_field($prop, $id);
            }

            $output = $prop_value ? '<li>'.$prop_name.': '.$prop_value.'</li>' : '';
            echo $output;
         }
         ?>
      </ul>
   </a>
   <?php
}