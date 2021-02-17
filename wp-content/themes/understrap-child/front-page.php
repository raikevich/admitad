<?php get_header(); ?>

<section class="my-5">
   <div class="container">
      <h2>Недвижимость</h2>
      <div class="row">
         <?php
         $reals = get_posts(array( 'post_type' => 'real',
             'order' => 'DESC',
             'orderby' => 'date',
             'posts_per_page' => 9
         ));

         foreach ( $reals as $real ) { ?>
            <div class="col-12 col-md-4">
               <?php echo_real( $real->ID ) ?>
            </div>
         <?php } ?>
      </div>
      <div class="row">
         <div class="col text-center">
            <a href="/real/" class="btn btn-primary">Вся недвижимость</a>
         </div>
      </div>
   </div>
</section>
<section class="my-5">
   <div class="container">
      <h2>Города</h2>
      <div class="row">
         <?php
         $cities = get_posts(array( 'post_type' => 'city',
             'order' => 'DESC',
             'orderby' => 'date',
             'posts_per_page' => 9
         ));

         foreach ( $cities as $city ) { ?>
            <div class="col-12 col-md-4">
               <a href="<?php the_permalink($city->ID); ?>" class="real__item">
                  <?php echo get_the_post_thumbnail($city->ID, 'thumbnail'); ?>
                  <h5><?php echo get_the_title($city->ID); ?></h5>
               </a>
            </div>
         <?php } ?>
      </div>
      <div class="row">
         <div class="col text-center">
            <a href="/city/" class="btn btn-primary">Все города</a>
         </div>
      </div>
   </div>
   </div>
</section>
<section class="my-5">
   <div class="container">
      <h2>Добавить недвижимость</h2>
      <form class="row form_add_real">
         <div class="col-12">
            <label>
               <p>Заголовок</p>
               <input type="text" name="title">
            </label>
            <label>
               <p>Тип</p>
               <select name="type">
                  <?php
                  $real_type = get_terms(array(
                      'taxonomy'=>'real-type'
                  ));

                  foreach ( $real_type as $type ) { ?>
                     <option value="<?php echo $type->term_id; ?>"><?php echo $type->name; ?></option>
                  <?php } ?>
               </select>
            </label>
            <label>
               <p>Площадь</p>
               <input type="number" name="space">
            </label>
            <label>
               <p>Стоимость</p>
               <input type="number" name="cost">
            </label>
            <label>
               <p>Адрес</p>
               <input type="text" name="address">
            </label>
            <label>
               <p>Жилая площадь</p>
               <input type="number" name="living_space">
            </label>
            <label>
               <p>Этаж</p>
               <input type="number" name="floor">
            </label>
            <label>
               <p>Город</p>
               <select name="city">
                  <?php
                  $cities = get_posts(array( 'post_type' => 'city',
                      'order' => 'ASC',
                      'orderby' => 'name',
                      'posts_per_page' => -1
                  ));

                  foreach ( $cities as $city ) { ?>
                     <option value="<?php echo $city->ID; ?>"><?php echo $city->post_title; ?></option>
                  <?php } ?>
               </select>
            </label>
         </div>
         <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">Добавить</button>
            <div class="form_add_real_result mt-3"></div>
         </div>
      </form>
   </div>
   </div>
</section>
<?php get_footer(); ?>
