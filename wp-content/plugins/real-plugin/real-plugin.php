<?php
/*
Plugin Name: Real Plugin
Description: Недвижимость
Version: 1.0
Author: Nikolay Raikevich
*/

// Creation post type Real
function real_init() {
   $labels = array(
       'name' => 'Недвижимость',
       'singular_name' => 'Недвижимость',
       'add_new' => 'Добавить новую',
       'add_new_item' => 'Добавить новую',
       'edit_item' => 'Редактировать',
       'new_item' => 'Новая недвижимость',
       'view_item' => 'Посмотреть недвижимость',
       'search_items' => 'Найти недвижимость',
       'not_found' => 'Не найдено',
       'not_found_in_trash' => 'В корзине не найдено',
       'parent_item_colon' => '',
       'menu_name' => 'Недвижимость'
   );
   $args = array(
       'labels' => $labels,
       'public' => true,
       'publicly_queryable' => true,
       'show_ui' => true,
       'show_in_menu' => true,
       'query_var' => true,
       'rewrite' => true,
       'capability_type' => 'post',
       'has_archive' => true,
       'menu_icon' => 'dashicons-admin-multisite',
       'hierarchical' => false,
       'menu_position' => null,
       'supports' => array( 'title', 'editor', 'thumbnail' )
   );
   register_post_type('real', $args);
   register_taxonomy(
       'real-type', array( 'portfolio' ), array(
       'hierarchical' => true,
       'label' => 'Тип недвижимости',
       'singular_label' => 'Тип недвижимости',
       'rewrite' => true ));
   register_taxonomy_for_object_type('real-type', 'real');
}

add_action('init', 'real_init');

// Creation post type City
function city_init()
{
   $labels = array(
       'name' => 'Города',
       'singular_name' => 'Город',
       'add_new' => 'Добавить новый',
       'add_new_item' => 'Добавить новый',
       'edit_item' => 'Редактировать',
       'new_item' => 'Новый город',
       'view_item' => 'Посмотреть город',
       'search_items' => 'Найти город',
       'not_found' =>  'Не найдено',
       'not_found_in_trash' => 'В корзине не найдено',
       'parent_item_colon' => '',
       'menu_name' => 'Города'

   );
   $args = array(
       'labels' => $labels,
       'public' => true,
       'publicly_queryable' => true,
       'show_ui' => true,
       'show_in_menu' => true,
       'query_var' => true,
       'rewrite' => true,
       'capability_type' => 'post',
       'has_archive' => true,
       'menu_icon' => 'dashicons-groups',
       'hierarchical' => false,
       'menu_position' => null,
       'supports' => array('title','editor','thumbnail')
   );
   register_post_type('city',$args);
}
add_action('init', 'city_init');